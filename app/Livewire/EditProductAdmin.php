<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Http\Request;
use LivewireUI\Modal\ModalComponent;


class EditProductAdmin extends ModalComponent
{
    public Product $product;
    public $title = '';
    public $description = '';
    // public $image;
    public  $quantity = 0;
    public  $price = 0;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->title = $product->title;
        $this->description = $product->description;
        $this->quantity = $product->quantity;
        $this->price = $product->price;
    }
    
    public function updateProduct()
    {
        $this->validate([
            'title' => 'required|max:57',
            'description' => 'required|max:500',
            // 'image' => 'required',
            'quantity' => 'required',
            'price' => 'required',

        ]);
        $this->product->title = $this->title;
        $this->product->description = $this->description;
        // $product->image = $this->image;
        $this->product->quantity = $this->quantity;
        $this->product->price = $this->price;
        $this->product->save();
        return redirect('/admin');
    } 

    public function render()
    {
        return view('livewire.edit-product-admin');
    }
}
