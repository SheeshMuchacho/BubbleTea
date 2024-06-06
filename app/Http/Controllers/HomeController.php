<?php

namespace App\Http\Controllers;

use App\Models\Payment;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use App\Models\User;

use App\Models\Product;

use App\Models\Order;

use App\Models\Cart;

use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{

    public function redirect()
    {
        if (Auth::check()) {
            $usertype = Auth::user()->usertype;

            if ($usertype == '1') {
                return view('admin.admindash');
            }

            $user = auth()->user();
            $carts = Cart::where('phone', $user->phone)->get();
            $count = $carts->count();
        }
        else {
            $carts = [];
            $count = 0;
        }
        $data = Product::paginate(3);

        return view('user.home', compact('data', 'carts', 'count'));
    }

    public function index()
    {
        return $this->redirect();
    }

    public function search(Request $request)
    {
        $search = $request->search;

        if ($search == '') {
            $data = Product::paginate(3);
        } else {
            $data = Product::where('title', 'LIKE', '%' . $search . '%')->get();
        }

        if (Auth::check()) {
            $user = auth()->user();
            $carts = Cart::where('phone', $user->phone)->get();
            $count = $carts->count();
        } else {
            $carts = [];
            $count = 0;
        }

        return view('user.home', compact('data', 'carts', 'count'));
    }

    public function ourproduct(Request $request)
    {
        $search = $request->search;

        if ($search) {
            $data = Product::where('title', 'like', '%' . $search . '%')->paginate(9);
        } else {
            $data = Product::paginate(9);
        }

        if (Auth::check()) {
            $user = auth()->user();
            $carts = Cart::where('phone', $user->phone)->get();
            $count = $carts->count();
        } else {
            $carts = [];
            $count = 0;
        }

        return view('user.ourproduct', compact('data', 'carts', 'count'));
    }

    public function addcart(Request $request, $id)
    {
        if (Auth::id())
        {
            $user = auth()->user();
            $product = Product::find($id);

            $existingCart = Cart::where('product_title', $product->title)
                ->where('phone', $user->phone)
                ->first();

            if ($existingCart) {
                $existingCart->quantity += $request->quantity;
                $existingCart->save();
            } else {
                $cart = new Cart;

                $cart->name = $user->name;
                $cart->phone = $user->phone;
                $cart->address = $user->address;
                $cart->product_title = $product->title;
                $cart->price = $product->price;
                $cart->quantity = $request->quantity;

                $cart->save();
            }

            return redirect()->back()->with('message', 'Product Added to Cart Successfully');
        }
        else
        {
            return redirect('login');
        }
    }

    public function deletecart($id)
    {
        $data=cart::find($id);

        $data->delete();

        return redirect()->back();
    }

    public function confirmorder(Request $request)
    {
        $user = auth()->user();
        $name = $user->name;
        $phone = $user->phone;
        $address = $user->address;

        $productNames = $request->productname;
        $quantities = $request->quantity;
        $prices = $request->price;

        Log::info('Confirming order for user: ' . $user->name);

        foreach ($productNames as $key => $productName) {
            $order = new Order;

            $product = Product::where('title', $productName)->first();
            if (!$product) {
                Log::error('Product not found: ' . $productName);
                return redirect()->back()->with('error', 'Product not found: ' . $productName);
            }

            if ($product->quantity < $quantities[$key]) {
                Log::error('Not enough stock for: ' . $productName);
                return redirect()->back()->with('error', 'Not enough stock for: ' . $productName);
            }

            // Reduce product quantity
            $product->decrement('quantity', $quantities[$key]);

            // Save each product in the order
            $order->product_name = $productNames[$key];
            $order->price = $prices[$key];
            $order->quantity = $quantities[$key];

            // Single values
            $order->name = $name;
            $order->phone = $phone;
            $order->address = $address;
            $order->status = 'not delivered';

            $order->save();
        }

        DB::table('carts')->where('phone', $phone)->delete();

        Log::info('Order confirmed for user: ' . $user->name);

        return redirect()->back()->with('message', 'Order Complete');
    }


    public function about()
    {
        return view('user.about');
    }

}
