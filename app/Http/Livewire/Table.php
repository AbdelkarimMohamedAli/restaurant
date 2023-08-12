<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;
    protected $paginationTheme='bootstrap';

    public $formstatus='';
    public $names,$table_id;
    public $chairs;
    public $creatform=false;

    protected $rules = [
        'names' => 'required',
        'chairs' => 'required|max:2000',
    ];
    protected $messages = [
        'names.required' => 'من فضلك ادخل رقم الطولة',
        'price.required' => 'من فضلك عدد الطاولات ',
    ];
    public function reseti(){
        $this->names='';
        $this->chairs='';
    }
    public function createToggle() {
        $this->creatform=!$this->creatform;
        $this->reseti();
        $this->formstatus=true;
    }
    public function render()
    {
        return view('livewire.table');
    }
}
