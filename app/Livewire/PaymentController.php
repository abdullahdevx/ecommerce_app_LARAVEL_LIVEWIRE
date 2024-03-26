<?php

namespace App\Livewire;

use Livewire\Component;
use Stripe\Stripe;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Http;
use App\Models\Product;
use App\Models\shoppingCart;

class PaymentController extends Component
{
    public $item;
    public $subTotal;
    // ITS A MODAL
    #[On('paymentEvent')] 
    public function processPayment()
    {
        $this->item = shoppingCart::with('product')->where('user_id', auth()->user()->id)->get();
        $this->subTotal = 0;
        foreach($this->item as $item)
        {
            $this->subTotal += $item->product->price * $item->quantity;
            
        }
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $response = $stripe->checkout->sessions->create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'LORAAAAA',
                        ],
                        'unit_amount' => $this->subTotal * 100,

                    ],
                    'quantity' => 3,
                ],
            ],
            'mode' => 'payment',
            'success_url' => 
            'cancel_url' => 
        ]);

    }


    public function render()
    {
        return view('livewire.payment-controller');
    }
}