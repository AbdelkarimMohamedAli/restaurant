<?php

namespace App\Http\Livewire\Item;

use Livewire\Component;

class Createmodel extends Component
{
    public $formstatus=true;
    
    public $names,$item_id;
    public $unit_id;
    public $price;

    
    public function render()
    {
        return view('livewire.item.createmodel');
    }
}
