<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Product;
use App\Models\shoppingCart;

class ShoppingCartComponent extends Component
{
    public $item;
    public $subTotal = 0;
    
  

    public function incrementQty($id)
    {
        $incrementId = shoppingCart::whereId($id)->first();
        $incrementId->quantity++;
        $incrementId->save();
    }

    public function decrementQty($id)
    {
        $decrementId = shoppingCart::whereId($id)->first();

        if($decrementId->quantity == 1)
        {
            //Will do nothing stay at 1
        }
        else
        {
            $decrementId->quantity--;
            $decrementId->save();
        }
    }

    public function removeItem($id)
    {
        $removeId = shoppingCart::whereId($id)->first();
        $removeId->delete();
        $this->dispatch('updateCount');
    }

 
    public function render()
    {
        $this->item = shoppingCart::with('product')->where('user_id', auth()->user()->id)->get();
        $this->subTotal = 0;
        foreach($this->item as $item)
        {
            $this->subTotal += $item->product->price * $item->quantity;
            // $this->subTotal += $this->Total; 
            
        }
        return view('livewire.shopping-cart-component', ['item' => $this->item]); 
    }
}
?>
