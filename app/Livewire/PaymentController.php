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
    public int $subTotal;
    // ITS A MODAL

    #[On('paymentEvent')] 
    public function processPayment()
    {
        $this->item = shoppingCart::with('product')->where('user_id', auth()->user()->id)->get();
        $this->subTotal = 0;
        $titles = [];
        foreach($this->item as $item)
        {
            $this->subTotal += $item->product->price * $item->quantity;
            $titles[] = $item->product->title;
        }
        $this->subTotal += 120;
        $products = implode(',', $titles);
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $response = $stripe->checkout->sessions->create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'pkr',
                        'product_data' => [
                           
                            'name' => $products,
                             
                        ],
                        'unit_amount' =>  $this->subTotal * 100,

                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('success').'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('cart'),
            
        ]);
        if(isset($response->id) && ($response->id != ''))
        {
            return redirect($response->url);
        }
        else
        {
            return redirect('/cart');
        }
    }


    public function render()
    {
        return view('livewire.payment-controller');
    }
}