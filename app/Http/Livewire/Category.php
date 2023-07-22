<?php

namespace App\Http\Livewire;

use App\Models\Category as ModelsCategory;
use Livewire\Component;
use Livewire\WithPagination;

class Category extends Component
{
    use WithPagination;
    protected $paginationTheme='bootstrap';

    protected $rules = [
        'names' => 'required',
    ];
    protected $messages = [
        'names.required' => 'من فضلك ادخل اسم القسم',
    ];
    public $formstatus=false;
    public $names,$category_id;
    public $creatform=false;
    public function reseti(){
        $this->names='';
        $this->category_id='';
    }
    public function createToggle() {
        $this->creatform=!$this->creatform;
        $this->reseti();
        $this->formstatus=true;
    }
    public function render()
    {
        $categories=ModelsCategory::query()->orderBy('id','desc')->paginate(5);
        return view('livewire.category',[
            'categories'=>$categories
        ]);
    }
    public function select(int $id){
        $unit=ModelsCategory::find($id);
        if($unit){
            $this->names=$unit->name;
            $this->category_id=$unit->id;
        }
        $this->formstatus=false;
        $this->creatform=true;

    }
    public function select2(int $id){
        $unit=ModelsCategory::find($id);
        if($unit){
            $this->names=$unit->name;
            $this->category_id=$unit->id;
        }
        $this->dispatchBrowserEvent('show-form',['modalId'=>'#form','actionModal'=>'show']);
    }
    public function addCategory(){
        $this->validate();
        ModelsCategory::create([
            'name'=>$this->names
        ]);
        $this->reseti();
        session()->flash('message', 'تمت الاضافه بنجاح');
        $this->creatform=false;

    }
    public function updateCategory($id){
        $this->validate();
        $unit=ModelsCategory::find($id);
        $unit->name=$this->names;
        $unit->save();
        session()->flash('message', 'تمت التعديل بنجاح');
        $this->creatform=false;
    }
    public function deleteCategory($id){
        $unit=ModelsCategory::find($id);
        $unit->delete();
        session()->flash('message', 'تمت الحذف بنجاح');

    }

}
