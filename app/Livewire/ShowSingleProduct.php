<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\shoppingCart;


class ShowSingleProduct extends Component
{
    public function addToCart($id)
    {
       dd('click');
        if(auth()->user())
        {
            //product will be added to Cart
            $data = [
                'user_id' => auth()->user()->id,
                'product_id' => $id,               
            ];

            shoppingCart::updateorCreate($data);
        }
        else
        {
            return redirect('/login');
        $this->dispatch('updateCount');

        }
       
    }


    public function render($id)
    {
        $product = Product::find($id);
        return view('livewire.show-single-product', ['product' => $product]);
    }
}
