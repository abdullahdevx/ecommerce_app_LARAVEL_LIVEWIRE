<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class SearchComponent extends Component
{
    public $search = "";


    public function render()
    {
        $results = [];

        if(strlen($this->search >= 1))
        {
            $results = Product::where('title', 'like','%'. $this->search . '%')->get();
        }
    
        return view('livewire.search-component',['result' => $results]);
    }
}
