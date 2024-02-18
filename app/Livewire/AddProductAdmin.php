<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithFileUploads;

class AddProductAdmin extends Component
{
    use WithFileUploads;

    public $title ;
    public $description ;
    public $quantity ;
    public $image;
    public $price ;

    public function addProduct()
    {
        $this->validate([
            'title' => 'required|max:57',
            'description' => 'required|max:500',
            'image' => 'required|image',
            'quantity' => 'required',
            'price' => 'required',

        ]);

        if($this->image)
        {
           $filePath = $this->image->store('images', 'public');
        }

        $product = new Product;
        $product->title = $this->title;
        $product->description = $this->description;
        $product->image = $filePath;
        $product->quantity = $this->quantity;
        $product->price = $this->price;
        $product->save();
        return redirect('/admin');
    }


    public function render()
    {
        return view('livewire.add-product-admin');
    }
}
