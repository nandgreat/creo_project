<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class AssignOfficerComponent extends Component
{   public $users,$officers,$selectedUser,$selectedOfficer,$page='Assign Officer';
    public function mount(){
        $this->users = User::where('accountType','Users')->get();
        $this->officers = User::where('accountType','!=','Users')->get();
    }
    public function render()
    {

        return view('livewire.assign-officer-component')->layout('layouts.app',[
            'page' => "Assign Customer",
        ]);
    }
    public function assign(){
        $validatedDate = $this->validate([
            'selectedUser' => 'required',
            'selectedOfficer' => 'required',
        ]);
        $user = User::find($this->selectedUser);
        $user->officer_id=$this->selectedOfficer;
        $user->save();
        $this->mount();
        session()->flash('message', 'Folder Created successfully.');

    }
}
