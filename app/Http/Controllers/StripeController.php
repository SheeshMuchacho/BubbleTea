<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Log;

class StripeController extends Controller
{
    public function stripe(Request $request)
    {
        $stripe = new \Stripe\StripeClient(config('stripe.stripe_sk'));

        $line_items = [];
        foreach ($request->productname as $key => $productname) {
            $line_items[] = [
                'price_data' => [
                    'currency' => 'lkr',
                    'product_data' => ['name' => $productname],
                    'unit_amount' => $request->price[$key] * 100, // assuming price is in LKR cents
                ],
                'quantity' => $request->quantity[$key],
            ];
        }

        try {
            $session = $stripe->checkout->sessions->create([
                'line_items' => $line_items,
                'mode' => 'payment',
                'success_url' => route('stripesuccess') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('stripecancel'),
            ]);

            if (isset($session->id) && $session->id != '') {
                session()->put('productname', $request->productname);
                session()->put('quantity', $request->quantity);
                session()->put('price', $request->price);

                Log::info('Stripe session created successfully: ' . $session->id);
                return redirect($session->url);
            } else {
                Log::error('Stripe session creation failed.');
                return redirect()->route('stripecancel');
            }
        } catch (\Exception $e) {
            Log::error('Stripe session creation exception: ' . $e->getMessage());
            return redirect()->route('stripecancel');
        }
    }

    public function stripesuccess(Request $request)
    {
        $sessionId = $request->session_id; // Get the session ID from the request

        Log::info('Stripe success callback called with session_id: ' . $sessionId);

        if ($sessionId) {
            $stripe = new \Stripe\StripeClient(config('stripe.stripe_sk'));
            $response = $stripe->checkout->sessions->retrieve($sessionId);

            $payment = new Payment();
            $payment->payment_id = $response->id;
            $payment->product_name = json_encode(session()->get('productname')); // JSON encode array
            $payment->quantity = json_encode(session()->get('quantity')); // JSON encode array
            $payment->price = json_encode(session()->get('price')); // JSON encode array
            $payment->currency = $response->currency;
            $payment->customer_name = $response->customer_details->name ?? 'Unknown';
            $payment->customer_email = $response->customer_details->email ?? 'Unknown';
            $payment->payment_status = $response->status;
            $payment->payment_method = "Stripe";
            $payment->save();

            // Call confirmorder method from HomeController
            $homeController = new HomeController();
            $homeController->confirmorder(new Request([
                'productname' => session()->get('productname'),
                'quantity' => session()->get('quantity'),
                'price' => session()->get('price')
            ]));

            // Clear session data after saving payment and confirming order
            session()->forget('productname');
            session()->forget('quantity');
            session()->forget('price');

            return redirect()->route('home')->with('message', 'Payment is Successful.');
        } else {
            Log::error('Stripe success callback called without session_id.');
            return redirect()->route('stripecancel');
        }
    }

    public function stripecancel(Request $request)
    {
        return redirect()->route('home')->with('message', 'Payment is Successful.');
    }
}
