<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use App\Models\User;

use App\Models\Product;

use App\Models\Order;

use App\Models\Cart;


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
        $user=auth()->user();

        $name=$user->name;
        $phone=$user->phone;
        $address=$user->address;

        foreach ($request->productname as $key=>$productname)
        {
            $order = new order;

            //multiple values
            $order->product_name = $request->productname[$key];
            $order->price = $request->price[$key];
            $order->quantity = $request->quantity[$key];

            //single values
            $order->name = $name;
            $order->phone = $phone;
            $order->address = $address;
            $order->status = 'not delivered';

            $order->save();

        }

        DB::table('carts')->where('phone', $phone)->delete();

        return redirect()->back()->with('message', 'Order Complete');

    }

}
