<?php

namespace App\Http\Livewire;

use App\Models\Item as ModelsItem;
use Livewire\Component;
use Livewire\WithPagination;

class Item extends Component
{
    use WithPagination;
    protected $paginationTheme='bootstrap';

    public $formstatus=true;
    public $toggleModel=false;
    public $names,$discreption,$item_id,$price;
    public function createform() {
        $this->formstatus=true;
        $this->toggleModel='show';
    }
    public function closeform() {
        $this->toggleModel='';
    }
    public function render()
    {
        $items=ModelsItem::query()->orderBy('updated_at','desc')->paginate(5);
        return view('livewire.item',[
            'items'=>$items
        ]);
        
    }
}
