<?php

namespace App\Livewire;

use Livewire\Component;

class SuccessOrderModal extends Component
{
    public function closeModal()
    {
        return redirect('/');

    }

    public function render()
    {
        return view('livewire.success-order-modal');
    }
}
