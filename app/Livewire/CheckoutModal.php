<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\order;
use App\Models\shoppingCart;
use App\Models\OrderItem;

class CheckoutModal extends Component
{
    public $name = '';
    public $number = '';
    public $address = '';
    public $email = '';
    public $city = '';
    public $province = '';
    public $otherAddressDetails = '';
    public int $totalOrderPrice = 0;

    public function saveOrder()
    {
        $this->validate([
            'name' => 'required',
            'number' => 'required',
            'address' => 'required',
            'email' => 'required',
            'city' => 'required',
            'province' => 'required',
            'otherAddressDetails' => 'required',
        ]);

        $user_id = auth()->user()->id;
        $cartItems = shoppingCart::with('product')->where('user_id', $user_id)->get();
        foreach($cartItems as $item)
        {
            $this->totalOrderPrice += $item->product->price * $item->quantity;
        }
        $this->totalOrderPrice += 120;

        $order = new Order;        
        $order->name = $this->name;
        $order->number = $this->number;
        $order->address = $this->address;
        $order->email = $this->email;
        $order->city = $this->city;
        $order->province = $this->province;
        $order->completeAddress = $this->otherAddressDetails;
        $order->totalorderprice = $this->totalOrderPrice;
        $order->user_id = $user_id;
        $order->payment_type = 'COD';
        $order->save();
        foreach ($cartItems as $item) {
            $orderItem = new OrderItem;
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item->product_id;
            $orderItem->product_quantity = $item->quantity;
            $orderItem->product_name = $item->product->title;
            $orderItem->product_image = $item->product->image;
            // Add any additional info to the order item
            $orderItem->save();
        }
        //delete the Items in cart of user!
        shoppingCart::where('user_id', $user_id)->delete();
        $this->dispatch('success-modal');
    }

    public function render()
    {
        return view('livewire.checkout-modal');
    }
}
