<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\shoppingCart;


class AdminAccess extends Component
{
    
    public function deleteProduct($id)
    {   
        Product::destroy($id);
    }


    public function render()
    {
        $products = Product::all();
        return view('livewire.admin-access', ['product' => $products]);
    }
}
