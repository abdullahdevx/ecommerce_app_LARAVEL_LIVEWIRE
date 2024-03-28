<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Illuminate\Support\Facades\Http;
use App\Models\Product;
use App\Models\shoppingCart;

class stripePaymentController extends Controller
{
    public function success(Request $request)
    {
        if(isset($request->session_id))
        {
            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
            $response = $stripe->checkout->sessions->retrieve($request->session_id);
            if($response->status = "complete")
               { 
                $user_id = auth()->user()->id;
                shoppingCart::where('user_id', $user_id)->delete();
                return redirect('/cart');
            }
        }
    }

    public function cancel(Request $request)
    {


    }
}