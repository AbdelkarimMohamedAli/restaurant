<?php

namespace App\Http\Livewire;

use App\Models\Unit as ModelsUnit;
use Livewire\Component;
use Livewire\WithPagination;

class Unit extends Component
{
    use WithPagination;
    protected $paginationTheme='bootstrap';
    
    public $formstatus=false;
    public $names,$unit_id;
    public $creatform=false;

    public function createToggle() {
        $this->creatform=!$this->creatform;
        $this->reseti();
        $this->formstatus=true;
    }

    public function reseti(){
        $this->names='';
        $this->unit_id='';
    }
    public function addUnit(){
        ModelsUnit::create([
            'name'=>$this->names
        ]);
        $this->reseti();
        session()->flash('message', 'تمت الاضافه بنجاح');

    }
    public function updateUnit($id){
        $unit=ModelsUnit::find($id);
        $unit->name=$this->names;
        $unit->save();
        session()->flash('message', 'تمت التعديل بنجاح');

    }
    public function deleteUnit($id){
        $unit=ModelsUnit::find($id);
        $unit->delete();
        session()->flash('message', 'تمت الحذف بنجاح');

    }
    public function render()
    {
        $units=ModelsUnit::query()->paginate(5);
        return view('livewire.unit',[
            'units'=>$units
        ]);
    }
    public function selectunit(int $id){
        $unit=ModelsUnit::find($id);
        if($unit){
            $this->names=$unit->name;
            $this->unit_id=$unit->id;
        }
        $this->formstatus=false;
        $this->creatform=true;

    }
    public function selectunit2(int $id){
        $unit=ModelsUnit::find($id);
        if($unit){
            $this->names=$unit->name;
            $this->unit_id=$unit->id;
        }
        $this->dispatchBrowserEvent('show-form',['modalId'=>'#form','actionModal'=>'show']);
    }
}
