<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\order;
use App\Models\orderItem;

class OrdersAdmin extends Component
{
    public $orders = [];

    public function render()
    {
        $this->orders = order::with('orderItemsRelation')->orderBy('created_at', 'desc')->get();
        return view('livewire.orders-admin', ['order' => $this->orders]);
    }
}
