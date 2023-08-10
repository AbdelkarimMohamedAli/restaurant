<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role as ModelsRole;
use Livewire\WithPagination;

class Role extends Component
{

    use WithPagination;
    protected $paginationTheme='bootstrap';

    public $formstatus='';
    public $name,$role_id;
    public $creatform=false;

    protected $rules = [
        'name'     => 'required',
    ];
    protected $messages = [
        'name.required' => 'من فضلك ادخل اسم المسئول',
    ];
    public function reseti(){
        $this->name='';
        $this->role_id=0;
    }
    public function createToggle() {
        $this->creatform=!$this->creatform;
        $this->reseti();
        $this->formstatus=true;
    }
    public function render()
    {
        // $roles=Role::whereNotIn('name', ['admin'])->get();
        $roles=ModelsRole::OrderBy('id','desc')->paginate('5');
        return view('livewire.role',compact('roles'));

    }

    public function edit(int $id){
        $role=ModelsRole::find($id);
        if($role){
            $this->name=$role->name;
            $this->role_id=$role->id;
        }
        $this->formstatus=false;
        $this->creatform=true;

    }
    public function delete(int $id){
        $role=ModelsRole::find($id);
        if($role){
            $this->name=$role->name;
            $this->role_id=$role->id;
        }
        $this->dispatchBrowserEvent('show-form',['modalId'=>'#form','actionModal'=>'show']);

    }
    public function deleteRole(int $id){

        $role=ModelsRole::where('id', $this->role_id)->first();
            if($role){
                $role->delete();
                session()->flash('message','تم الحذف بنجاح!!');
                $this->reseti();
            }
    }
    public function store(){

        $this->validate();

        try{
            // Create Post
            ModelsRole::create([
                'name'=>$this->name,
            ]);
     
            // Set Flash Message
            session()->flash('message','تمت الاضافه بنجاح!!');
 
        }catch(\Exception $e){
            // Set Flash Message
            session()->flash('message','حصل شي خطأ !!');
 
        }
    }

    public function update($id)
    {
        $role = ModelsRole::find($id);
        if($role){  
            $role->name=$this->name;
            $role->save();
        }
    }
}
