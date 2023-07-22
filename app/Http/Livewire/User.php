<?php

namespace App\Http\Livewire;

use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class User extends Component
{
    use WithPagination;
    protected $paginationTheme='bootstrap';

    public $formstatus='';
    public $names,$user_id;
    public $email,$password;
    public $creatform=false;

    protected $rules = [
        'names' => 'required',
        'email' => 'required|max:200',
        'password' => 'required|max:200',
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
        $query =ModelsUser::query()->paginate(5);
        return view('livewire.user',[
            'users'=>$query
        ]);
    }

    public function selectMtrial(int $id){
        $user=ModelsUser::find($id);
        if($user){
            $this->names=$user->name;
            $this->user_id=$user->id;
            $this->email=$user->email;
            $this->password=$user->password;
        }
        $this->formstatus=false;
        $this->creatform=true;

    }
    public function selectMtrial2(int $id){
        $user=ModelsUser::find($id);
        if($user){
            $this->names=$user->name;
            $this->user_id=$user->id;
            $this->email=$user->email;
            $this->password=$user->password;
        }
        $this->dispatchBrowserEvent('show-form',['modalId'=>'#form','actionModal'=>'show']);
    }
    public function addUser(){
        ModelsUser::create([
            'name'=>$this->names,
            'email'=>$this->email,
            'password'=>Hash::make($this->password)
        ]);
        session()->flash('message', 'تمت الاضافه بنجاح');

    }
}
