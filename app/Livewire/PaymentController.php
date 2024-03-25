<?php

namespace App\Livewire;

use Livewire\Component;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Support\Facades\Http;

class PaymentController extends Component
{
    // ITS A MODAL
    public string $cardName;
    public int $cardNumber;
    public int $cvc;
    public int $expirationMonth;
    public int $expirationYear;
    
    public function processPayment()
    {
        $this->validate([
            'cardName' => 'required|string',
            'cardNumber' => 'required|int',
            'cvc' => 'required|int',
            'expirationMonth' => 'required|int',
            'expirationYear' => 'required|int',
        ]);
        
        Stripe\Stripe::setApiKey(env('STRIPE_SECERT'));
        Stripe\Charge::create([
            "amount" => 100 * 100,
            "currency" => 'usd',
            "source" => ,
            "description" => 'payment Laravel',

        ]);
        
    }

    public function render()
    {
        return view('livewire.payment-controller');
    }
}