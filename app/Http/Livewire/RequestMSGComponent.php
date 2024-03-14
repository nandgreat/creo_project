<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\RequestModel;

class RequestMSGComponent extends Component
{
    public $first_name,$last_name,$email,$phone,$reference,$message;
    public function render()
    {
        return view('livewire.request-m-s-g-component')->layout('layouts.app',[
            'page' => "Make Request",
        ]);
    }
    public function store(){
        $this->validate([
            'first_name' =>'required',
            'last_name' =>'required',
            'email' =>'required',
            'phone' =>'required',
            'reference' =>'required',
        ]);
        $shareFileModel = new RequestModel;
        $shareFileModel->first_name = $this->first_name;
        $shareFileModel->last_name = $this->last_name;
        $shareFileModel->email = $this->email;
        $shareFileModel->phone = $this->phone;
        $shareFileModel->reference = $this->reference;
        $shareFileModel->comment = $this->message;
        $shareFileModel->save();
        session()->flash('message', 'Request sent successfully.');
    }
}
