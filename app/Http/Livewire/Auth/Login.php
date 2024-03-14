<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
class Login extends Component
{
    public $users, $email, $password;

    public function render()
    {
        return view('livewire.auth.login');
    }
    public function login()
    {
        try{

            $validatedDate = $this->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
            if(\Auth::attempt(array('email' => $this->email, 'password' => $this->password))){
                session()->flash('message', "You are Login successful.");
                $url ='/';
                return redirect()->to($url);
            }else{
                session()->flash('error', 'email and password are wrong.');
            }
        }catch(Exception $e){
            session()->flash('error', $e->getMessage());
        }
    }


}
