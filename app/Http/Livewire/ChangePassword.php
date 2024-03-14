<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Hash;
use App\Models\User as UserModel;

class ChangePassword extends Component
{
    public $data,$i=0,$page='User Management';
    public  $user,$email, $password, $first_name,$last_name,$comfirm_password,$roles,$editID;
    public function mount($id = null)
    {
        $this->editID = $id;
        $this->fetchUser();
        $this->data =UserModel::all();

    }
    public function fetchUser()
    {
        if ($this->editID) {
            $this->user = UserModel::findOrFail($this->editID);
            $this->edit($this->user);
        } else {
            $this->user = null;
        }
    }

    public function render()
    {
        return view('livewire.change_password')->layout('layouts.app',[
            'page' => "User Management",
        ]);
    }
    private function resetInputFields(){
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->password = '';
        $this->comfirm_password = '';
    }
    public function store()
    {
        try{
        $validatedDate = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'roles' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'comfirm_password' => 'required',
        ]);
        $storedata =[
            'first_name' => $this->first_name,
         'last_name' => $this->last_name,
         'email' => $this->email,
         'password' => Hash::make($this->password),
         'accountType'=>($this->roles == 'users')?'users':'Admin',
         'roles'=>$this->roles,
         ];
        UserModel::create($storedata);
        session()->flash('message', 'User registered successfully');
        $this->resetInputFields();
    }catch(Exception $e){
        session()->flash('message', $e->getMessage());
    }
    }
    public function update()
    {
        try{
        $validatedDate = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'roles' => 'required',
            'email' => "required|email|unique:users,email,$this->editID,id",
        ]);
        $user = UserModel::findorfail($this->editID);
        $storedata =[
            'first_name' => $this->first_name,
         'last_name' => $this->last_name,
         'email' => $this->email,
         'password' => $this->password?Hash::make($this->password):$user->password,
         'accountType'=>($this->roles == 'users')?'Users':'Admin',
         'roles'=>$this->roles,
         ];
        $user->update($storedata);
        session()->flash('message', 'User Updated');
    }catch(Exception $e){
        session()->flash('message', $e->getMessage());
    }
    }
    public function edit($data){
        $this->first_name = $data->first_name;
        $this->last_name = $data->last_name;
        $this->email = $data->email;
        $this->roles = $data->roles;
        $this->editID = $data->id;
    }
}
