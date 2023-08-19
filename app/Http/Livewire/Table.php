<?php

namespace App\Http\Livewire;

use App\Models\MTable;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;
    protected $paginationTheme='bootstrap';

    public $formstatus='';
    public $names,$table_id;
    public $chairs,$status=0;
    public $creatform=false;

    protected $rules = [
        'names' => 'required',
        'chairs' => 'required|max:2000',
    ];
    protected $messages = [
        'names.required' => 'من فضلك ادخل رقم الطولة',
        'chairs.required' => 'من فضلك عدد الطاولات ',
    ];
    public function reseti(){
        $this->names='';
        $this->chairs='';
        $this->status=0;
    }
    public function createToggle() {
        $this->creatform=!$this->creatform;
        $this->reseti();
        $this->formstatus=true;
    }
    public function render()
    {   
        $tables=MTable::query()->orderBy('created_at','desc')->paginate(5);
        return view('livewire.table',[
            'tables'=>$tables
        ]);
    }
    public function addTable(){
        $this->validate();
        MTable::create([
            'name'=>$this->names,
            'chairs'=>$this->chairs,
            'status'=>$this->status,
            'reserved'=>''
        ]);
        $this->reseti();
        session()->flash('message', 'تمت الاضافه بنجاح');

    }
    public function updateTable($id){
        $this->validate();
        $table=MTable::find($id);
        $table->name=$this->names;
        $table->chairs=$this->chairs;
        $table->status=$this->status;
        $table->save();
        $this->reseti();
        $this->creatform=false;
        session()->flash('message', 'تمت التعديل بنجاح');
    }
    public function select($id){
        $table=MTable::find($id);
        if($table){ 
            $this->names=$table->name;
            $this->chairs=$table->chairs;
            $this->status=$table->status;
            $this->table_id=$table->id;
        }
        $this->formstatus=false;
        $this->creatform=true;
    }
    public function select2($id){
        $table=MTable::find($id);
        if($table){ 
            $this->names=$table->name;
            $this->chairs=$table->chairs;
            $this->status=$table->status;
            $this->table_id=$table->id;
        }
        $this->dispatchBrowserEvent('show-form',['modalId'=>'#form','actionModal'=>'show']);
        
    }
    public function deleteTable($id){
        $table=MTable::find($id);
        $table->delete();
        session()->flash('message', 'تمت الحذف بنجاح');
    }
}
