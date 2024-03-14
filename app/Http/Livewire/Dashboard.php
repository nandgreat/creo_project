<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $auth;
    public function mount(){
        $this->auth = auth()->user();
    }
    public function render()
    {
        return view('livewire.dashboard')->layout('layouts.app');
    }
}
