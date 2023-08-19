<?php

namespace App\Http\Livewire;

use App\Models\MTable;
use Livewire\Component;

class BookTable extends Component
{
    public $time,$time2,$customer;
    public $date,$table_id,$names;
    public $bookTable_form='';
    public $reserved=[];

    public function opnBTabel($id){
        $table=MTable::find($id);
        $this->table_id=$table->id;
        $this->names=$table->name;


        $this->bookTable_form='show';

    }
    public function close_opm(){
        $this->bookTable_form='';

    }

    public function render()
    {
        $tables=MTable::all();
        return view('livewire.book-table',[
            'tables'=>$tables
        ]);
    }
}