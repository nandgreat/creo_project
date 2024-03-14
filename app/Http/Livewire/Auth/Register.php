<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class Register extends Component
{
    public  $email, $password, $first_name,$last_name,$comfirm_password;
    public $registerForm = false;

    public function render()
    {
        return view('livewire.auth.register');
    }
    private function resetInputFields(){
        $this->first_name = '';
        $this->last_name = '';
        $this->email =session('email')?? '';
        $this->password = '';
        $this->comfirm_password = '';
    }
    public function store()
    {
        try{
        $validatedDate = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'comfirm_password' => 'required',
        ]);
        $this->password = Hash::make($this->password);
        User::create(['first_name' => $this->first_name, 'last_name' => $this->last_name,'email' => $this->email,'password' => $this->password,'accountType'=>'Users','roles'=>'users']);
        session()->flash('message', 'Your register successfully Go to the login page.');
        $this->resetInputFields();
    }catch(Exception $e){
        session()->flash('message', $e->getMessage());
    }
    }

}
