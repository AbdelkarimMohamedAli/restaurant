<?php

namespace App\Http\Livewire;

use App\Models\Addon as ModelsAddon;
use Livewire\Component;
use Livewire\WithPagination;

class Addon extends Component
{
    use WithPagination;
    protected $paginationTheme='bootstrap';

    protected $rules = [
        'names' => 'required',
        'price' => 'required|max:2000',
    ];
    protected $messages = [
        'names.required' => 'من فضلك ادخل اسم الاضافه',
        'price.required' => 'من فضلك ادخل السعر ',
    ];
    public $formstatus=false;
    public $names,$addon_id,$price;
    public $creatform=false;

    public function createToggle() {
        $this->creatform=!$this->creatform;
        $this->reseti();
        $this->formstatus=true;
    }
    public function reseti() {
        $this->names='';
        $this->addon_id='';
        $this->price='';
    }
    public function render()
    {
        $addons=ModelsAddon::query()->paginate(5);
        return view('livewire.addon',[
            'addons'=>$addons
        ]);
    }
    public function selectAddon(int $id){
        $unit=ModelsAddon::find($id);
        if($unit){
            $this->names=$unit->name;
            $this->price=$unit->price;
            $this->addon_id=$unit->id;
        }
        $this->formstatus=false;
        $this->creatform=true;

    }
    public function selectAddon2(int $id){
        $unit=ModelsAddon::find($id);
        if($unit){
            $this->price=$unit->price;
            $this->names=$unit->name;
            $this->addon_id=$unit->id;
        }
        $this->dispatchBrowserEvent('show-form',['modalId'=>'#form','actionModal'=>'show']);
    }
    public function addAddon(){
        $this->validate();
        ModelsAddon::create([
            'name'=>$this->names,
            'price'=>$this->price
        ]);
        $this->reseti();
        session()->flash('message', 'تمت الاضافه بنجاح');
        $this->creatform=false;
    }
    public function updateAddon($id){
        $this->validate();

        $unit=ModelsAddon::find($id);
        $unit->name=$this->names;
        $unit->price=$this->price;
        $unit->save();
        session()->flash('message', 'تمت التعديل بنجاح');
        $this->creatform=false;
    }
    public function deleteAddon($id){
        $unit=ModelsAddon::find($id);
        $unit->delete();
        session()->flash('message', 'تمت الحذف بنجاح');

    }

}
