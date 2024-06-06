<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class CartMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $carts = Cart::where('phone', $user->phone)->get();
            $count = $carts->count();
        } else {
            $carts = collect(); // empty collection
            $count = 0;
        }

        view()->share('carts', $carts);
        view()->share('count', $count);

        return $next($request);
    }
}
