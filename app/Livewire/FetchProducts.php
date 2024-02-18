<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\shoppingCart;


class FetchProducts extends Component
{
    public function addtoCart($id)
    {
        if(auth()->user())
        {
            //product will be added to Cart
            $data = [
                'user_id' => auth()->user()->id,
                'product_id' => $id,               
            ];

            shoppingCart::updateorCreate($data);
            $this->dispatch('updateCount');
            $this->dispatch('updateCart');                 
        }
        else
        {
            return redirect('/login');
        }

    }

    
    public function render()
    {
        $products = Product::all();
        return view('livewire.fetch-products', ['product' => $products]);
    }
}