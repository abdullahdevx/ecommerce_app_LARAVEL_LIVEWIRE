<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Illuminate\Support\Facades\Http;

class stripePaymentController extends Controller
{
    public function success(Request $request)
    {
        if(isset($request->session_id))
        {
            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
            $response = $stripe->checkout->sessions->retrieve($request->session_id);
            dd($response);
        }

    }

    public function cancel(Request $request)
    {


    }
}
