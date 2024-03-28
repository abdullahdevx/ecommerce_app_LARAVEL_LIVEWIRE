<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\Attributes\On;
use App\Models\Product;
use App\Models\shoppingCart;
use App\Models\Order;
use App\Models\OrderItem;


class CheckoutModalForOnlinePayment extends Component
{
    public $item;
    public int $subTotal ;
    public $name = '';
    public $number = '';
    public $address = '';
    public $email = '';
    public $city = '';
    public $province = '';
    public $otherAddressDetails = '';
    public int $totalOrderPrice ;

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

    public function success(Request $request)
    {
        // dd($this->name);

        $this->item = shoppingCart::with('product')->where('user_id', auth()->user()->id)->get();
        $this->subTotal = 0;
        foreach($this->item as $item)
        {
            $this->subTotal += $item->product->price * $item->quantity;
        }
        $this->subTotal += 120;

        if(isset($request->session_id))
        {
            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
            $response = $stripe->checkout->sessions->retrieve($request->session_id);
            if($response->status = "complete")
               { 
                $user_id = auth()->user()->id;
                $order = new Order;        
                $order->name = $this->name;
                $order->number = $this->number;
                $order->address = $this->address;
                $order->email = $this->email;
                $order->city = $this->city;
                $order->province = $this->province;
                $order->completeAddress = $this->otherAddressDetails;
                $order->totalorderprice = $this->subTotal;
                $order->user_id = $user_id;
                // $order->payment_type = 'payment successfull';
                $order->save();
                foreach ($this->item as $item) {
                    $orderItem = new OrderItem;
                    $orderItem->order_id = $order->id;
                    $orderItem->product_id = $item->product_id;
                    $orderItem->product_quantity = $item->quantity;
                    $orderItem->product_name = $item->product->title;
                    $orderItem->product_image = $item->product->image;
                    // Add any additional info to the order item
                    $orderItem->save();
                }
                shoppingCart::where('user_id', $user_id)->delete();
                return redirect('/cart');
            }
        }


    }
    public function render()
    {
        return view('livewire.checkout-modal-for-online-payment');
    }
}
