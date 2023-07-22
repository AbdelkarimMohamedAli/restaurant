<?php

namespace App\Http\Livewire;

use App\Models\Matrial as ModelsMatrial;
use App\Models\Unit;
use Livewire\Component;
use Livewire\WithPagination;

class Matrial extends Component
{
    use WithPagination;
    protected $paginationTheme='bootstrap';

    public $formstatus='';
    public $names,$matrial_id;
    public $unit_id;
    public $price;
    public $creatform=false;

    protected $rules = [
        'names' => 'required',
        'unit_id' => 'required',
        'price' => 'required|max:2000',
    ];
    protected $messages = [
        'names.required' => 'من فضلك ادخل اسم الخامه',
        'unit_id.required' => 'من فضلك اختر الوحده',
        'price.required' => 'من فضلك ادخل السعر ',
    ];
    public function reseti(){
        $this->names='';
        $this->unit_id=0;
        $this->price='';
    }
    public function createToggle() {
        $this->creatform=!$this->creatform;
        $this->reseti();
        $this->formstatus=true;
    }
    
    public function render()
    {   
        $query =ModelsMatrial::query();
        return view('livewire.matrial',[
            'matrials'=>$query->paginate(5),
            'units'=>Unit::all(),
        ]);
    }

    public function addMatrial(){
        $this->validate();
        ModelsMatrial::create([
            'name'=> $this->names,
            'unit_id'=>$this->unit_id,
            'price'=>$this->price
        ]);
        $this->reseti();
        session()->flash('message', 'تمت الاضافه بنجاح');
    }
    public function updateMatrial($id){
        $this->validate();
        $matrial=ModelsMatrial::find($id);
        $matrial->name=$this->names;
        $matrial->unit_id=$this->unit_id;
        $matrial->price=$this->price;
        $matrial->save();
        $this->reseti();
        $this->creatform=false;
        session()->flash('message', 'تمت التعديل بنجاح');

    }
    
    public function selectMtrial(int $id){
        $matrial=ModelsMatrial::find($id);
        if($matrial){
            $this->names=$matrial->name;
            $this->matrial_id=$matrial->id;
            $this->unit_id=$matrial->unit_id;
            $this->price=$matrial->price;
        }
        $this->formstatus=false;
        $this->creatform=true;

    }
    public function selectMtrial2(int $id){
        $matrial=ModelsMatrial::find($id);
        if($matrial){
            $this->names=$matrial->name;
            $this->matrial_id=$matrial->id;
            $this->unit_id=$matrial->unit_id;
            $this->price=$matrial->price;
        }
        
        $this->dispatchBrowserEvent('show-form',['modalId'=>'#form','actionModal'=>'show']);
    }
    public function deleteMatrial(int $id){
        $matrial=ModelsMatrial::find($id);
        $matrial->delete();
        session()->flash('message', 'تمت الحذف بنجاح');
    }




    
}

