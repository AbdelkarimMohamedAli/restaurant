<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission as ModelsPermission;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;

class Permission extends Component
{

    use WithPagination;
    protected $paginationTheme='bootstrap';

    public $formstatus='';
    public $name,$permission_id;
    public $creatform=false;

    protected $rules = [
        'name'     => 'required',
    ];
    protected $messages = [
        'name.required' => 'من فضلك ادخل اسم الصلاحية',
    ];
    public function reseti(){
        $this->name='';
        $this->permission_id=0;
    }
    public function createToggle() {
        $this->creatform=!$this->creatform;
        $this->reseti();
        $this->formstatus=true;
    }
    public function render()
    {
        // $roles=Role::whereNotIn('name', ['admin'])->get();
        $permissions=ModelsPermission::OrderBy('id','desc')->paginate('5');
        return view('livewire.permission',compact('permissions'));

    }

    public function edit(int $id){
        $permission=ModelsPermission::find($id);
        if($permission){
            $this->name=$permission->name;
            $this->permission_id=$permission->id;
        }
        $this->formstatus=false;
        $this->creatform=true;

    }
    public function delete(int $id){
        $permission=ModelsPermission::find($id);
        if($permission){
            $this->name=$permission->name;
            $this->permission_id=$permission->id;
        }
        $this->dispatchBrowserEvent('show-form',['modalId'=>'#form','actionModal'=>'show']);

    }
    public function deletePermission(int $id){

        $permission=ModelsPermission::where('id', $this->permission_id)->first();
            if($permission){
                $permission->delete();
                session()->flash('message','تم الحذف بنجاح!!');
                $this->reseti();
            }
    }
    public function store(){

        $this->validate();

        try{
            // Create Post
            ModelsPermission::create([
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
        $permission = ModelsPermission::find($id);
        if($permission){  
            $permission->name=$this->name;
            $permission->save();
        }
    }
}
