<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Chats;

class Adminchart extends Component
{
    public  $user_id,$message,$name,$chatMessages,$targetEmail;
    public function mount(){
        $this->name = auth()->user()->first_name.' '.auth()->user()->last_name;
        $this->user_id =auth()->user()->id;
    }
    public function render()
    {
        $users = Chats::select('chats.email')->groupBy('email')->get();

        return view('livewire.adminchart',compact('users'));
    }
    public function onInterval(int $interval = 5)
    {
        if($this->targetEmail){
            $this->chatMessages = Chats::Where('email', $this->targetEmail)->get();
        }
    }
    public function selectUser($email)
    {
        $this->targetEmail = $email;
    }
    public function send(){
        $message = Chats::create(['name'=>$this->name,'message'=>$this->message,'target_email'=>$this->targetEmail,'email'=>$this->targetEmail]);
        if($message){
            $this->chatMessages = Chats::Where('email', $this->targetEmail)->get();
        }
    }

}
