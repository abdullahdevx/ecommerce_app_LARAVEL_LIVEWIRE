<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\shoppingCart;

class CartCounter extends Component

{   
    protected $listeners = ['updateCount' => 'render'];

    public function render()
    {
        $items = shoppingCart::where('user_id', auth()->user()->id)->get();
        return view('livewire.cart-counter', ['item' => $items]);
    }
}
