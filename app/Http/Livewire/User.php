<?php

namespace App\Http\Livewire;

use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class User extends Component
{

   
   
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme='bootstrap';

    public $formstatus='';
    public $names,$user_id;
    public $email,$password;
    public $image;
    public $creatform=false;
    public $RoleForm=false;
    public $user_name;
    public $user_email;
    public $user_roles=[];
    public $user_permissions=[];
    public $role_id;
    public $permission_id;


    protected $rules = [
        'names'     => 'required',
        'email'     => 'required|max:200',
        'password'  => 'required|max:200',
        'image'     => 'nullable|mimes:jpg,jpeg,gif,png|max:20000',
    ];
    protected $messages = [
        'names.required' => 'من فضلك ادخل اسم المستخدم',
        'email.required' => 'من فضلك ادخل البريد الاليكتروني ',
        'password.required' => 'من فضلك ادخل الباسورد ',
    ];
    public function reseti(){
        $this->names='';
        $this->user_id=0;
        $this->email='';
        $this->password='';
    }
    public function createToggle() {
        $this->creatform=!$this->creatform;
        $this->reseti();
        $this->formstatus=true;
    }
    public function render()
    {
        $users=ModelsUser::OrderBy('id','desc')->paginate('5');
        $permissions=Permission::all();
        $roles=Role::all();
        return view('livewire.user',compact('users','roles','permissions'));
    }

    public function edit(int $id){
        $user=ModelsUser::find($id);
        if($user){
            $this->names=$user->name;
            $this->user_id=$user->id;
            $this->email=$user->email;
            $this->password=$user->password;
            $this->image=$user->image;
        }
        $this->formstatus=false;
        $this->creatform=true;

    }
    public function delete(int $id){
        $user=ModelsUser::find($id);
        if($user){
            $this->names=$user->name;
            $this->user_id=$user->id;
            $this->email=$user->email;
            $this->password=$user->password;
        }
        $this->dispatchBrowserEvent('show-form',['modalId'=>'#form','actionModal'=>'show']);

    }
    public function deleteUser(int $id){

        $user = ModelsUser::where('id', $this->user_id)->first();
            if($user){
                if (File::exists('storage/'.$user->image)) {
                    unlink('storage/'.$user->image);
                }
            $user->delete();
            session()->flash('success','user Deleted Successfully!!');
            $this->reseti();
            }
    }
    public function store(){

        $this->validate();

        try{
            $image=$this->image->getClientOriginalName();
            $path=$this->image->storeAs('users',$image,'public');

            // Create Post
            ModelsUser::create([
                'name'=>$this->names,
                'email'=>$this->email,
                'password'=>Hash::make($this->password),
                'image'=>$path,
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
        $user = ModelsUser::find($id);
        if($user){
            if ($user->image == $this->image) {
                
                $user->name=$this->names;
                $user->email=$this->email;
                $user->password=$this->password;
                $user->image=$this->image;
                $user->save();

            }else{
                if (File::exists('storage/'.$user->image)) {
                    unlink('storage/'.$user->image);
                } 
                $image=$this->image->getClientOriginalName();
                $path=$this->image->storeAs('users',$image,'public');

                $user->name=$this->names;
                $user->email=$this->email;
                $user->password=$this->password;
                $user->image=$path;
                $user->save();
            }

        }  
    }

    public function show($id)
    {
       
        if(!auth()->user()->hasRole('admin')){

           return  session()->flash('message','  هذا ليس ادمن!!');
            
 
        }
        
        $this->reseti();
        $this->user_id='';
        $this->user_id=$id;
        $this->RoleForm=true;
        $this->user_roles=[];
        $this->user_permissions=[];
        $user= ModelsUser::find($id);
                  
        if($user->roles){
            $roles=$user->roles;
            
            foreach($roles as $role)
            {
                $this->user_roles[$role->id] = $role->name;
            }
        }
        if($user->permissions){
            $permissions=$user->permissions;
            
            foreach($permissions as $permission)
            {
                $this->user_permissions[$permission->id] = $permission->name;
            }
        }
        
        $this->user_name=$user->name;
        $this->user_id=$id;
        $this->user_email=$user->email;
   
    }

    public function removeRole($roleId){

        $role=Role::find($roleId);
       
        $user=ModelsUser::find($this->user_id);
        
        if($user->hasRole($role->name)){

            
            $user->removeRole($role->name);
            unset($this->user_roles[$role->id]);

            session()->flash('message','تمت حذف الدور!!');
            
       }else{
    //        $this->user_roles='';
           session()->flash('message','الدور غير موجودة!!');
       }
    }

    public function removePermission($permissionId){

        $permission=Permission::find($permissionId);
       
        $user=ModelsUser::find($this->user_id);
        
        if($user->hasPermissionTo($permission->name)){

            
            $user->revokePermissionTo($permission->name);
            unset($this->user_permissions[$permission->id]);

            session()->flash('message','تمت حذف الصلاحية!!');
            
       }else{
    //        $this->user_roles='';
           session()->flash('message','الصلاحية غير موجودة!!');
       }
    }

    public function assignRole($id){

        $user=ModelsUser::find($id);
        $role=Role::find($this->role_id);
        if($user->hasRole($role->name)){

            session()->flash('message','الدور موجود!!');
        }else{
            $user->assignRole($role->name);
            $this->user_roles[$role->id] = $role->name;
                       
            session()->flash('message','تمت اضافة الدور');
        }
        
    }

    public function givePermission($id){

        $user=ModelsUser::find($id);
        $permission=Permission::find($this->permission_id);
        if($user->hasPermissionTo($permission->name)){

            session()->flash('message','الصلاحية موجود!!');
        }else{
            $user->givePermissionTo($permission->name);
            $this->user_permissions[$permission->id] = $permission->name;
                       
            session()->flash('message','تمت اضافة الصلاحية');
        }
        
    }

   
}
