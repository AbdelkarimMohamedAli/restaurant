<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    protected $rules=[
        'email'=>'required',
        'password'=>'required'
    ];
    protected $messages = [
        'email.required' => 'من فضلك ادخل  الايميل',
        'password'=>'من فضلك ادخل كلة السر'
    ];
    public function render()
    {
        return view('livewire.login');
    }
    function submit() 
    {
        $this->validate();
        if(Auth::attempt(['email'=>$this->email,'password'=>$this->password])){
            return redirect(route('home'));
            session()->flash('message', 'تم تسجيل الدخول بنجاح');
        }else{
            session()->flash('message', 'الباسورد او البريد الاليكتروني خطأ');
        }
        
    }
}
