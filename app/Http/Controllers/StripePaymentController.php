<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe;

class StripePaymentController extends Controller
{
    public function stripe()
    {
        return view('paiement.stripe');
    }

    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            'amount' => 100 * 100,
            'currency' => "usd",
            'source' => $request->stripeToken,
            'description' => 'Test from syk',
        ]);

        Session::flash('success', 'Payment has been successfully');
        return back();
    }
}
