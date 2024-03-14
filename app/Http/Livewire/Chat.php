<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Chats;
use App\Models\Resource;
use Illuminate\Support\Facades\Session;


class Chat extends Component
{


    public $message,$name,$email,$selectedTopic,$storyContent,$contentselected,$errorMessage,$chatMessages,$user_id;
    public function mount(){
        $this->storyContent = Resource::all();

        if(auth()->check()){
            $this->name = auth()->user()->first_name.' '.auth()->user()->last_name;
            $this->email = auth()->user()->email;
            $user_id =auth()->user()->id;
        }else{
            if(!$this->name){
                if( session('name')){
                    $this->name = session('name');
                }
            }
            if(!$this->email){
                if( session('email')){
                    $this->email = session('email');
                }
            }
            if(!$this->selectedTopic){
                if( session('selectedTopic')){
                    $this->selectedTopic = session('selectedTopic');
                }
            }


        }
        if( $this->email){
            $this->chatMessages = Chats::orWhere([['email', $this->email]])->get();
        }

    }
    public function render()
    {
        return view('livewire.chat');
    }
    public function onInterval(int $interval = 5)
    {
        $this->chatMessages = Chats::orWhere([['email', $this->email]])->get();
    }


    public function send(){
        try{
            $tryerror =0;
            $setResource=null;
            if($this->name == null){
                $this->name = $this->message;
                session(['name' => $this->name]);
                $this->message ='';
                return false;
            }elseif($this->name != null && $this->email == null){
                if (filter_var($this->message, FILTER_VALIDATE_EMAIL)) {
                    session(['email' => $this->message]);
                    $this->email = $this->message;
                    $this->message ='';
                    $this->errorMessage ='';
                    Chats::create(['name'=>'GLC','message'=>"Hi, Whats your name?",'target_email'=>$this->email,'email'=>$this->email]);
                    Chats::create(['name'=>$this->name,'message'=>$this->name,'user_id'=>$this->user_id,'email'=>$this->email]);
                    Chats::create(['name'=>'GLC','message'=>"Your Email?",'target_email'=>$this->email,'email'=>$this->email]);
                    Chats::create(['name'=>$this->name,'message'=>$this->email,'user_id'=>$this->user_id,'email'=>$this->email]);
                } else {
                    $this->errorMessage ="Email is invalid";
                }
                return false;
            }elseif($this->name != null && $this->email != null && $this->selectedTopic == null){
                $words = explode(" ", $this->message);
                if(count($words)){
                    foreach ($words as $word) {
                        $setResource = Resource::where('title', 'like', '%' . $word . '%')->first();
                        if ($setResource) {
                            break; // Exit the loop if a matching resource is found
                        }
                    }

                }

                if($setResource){
                    $this->selectedTopic = $this->message;
                    session(['selectedTopic' => $this->selectedTopic]);

                    $this->contentselected = $setResource->content.'\n Do you want more assistance from us?';
                }else{
                    $tryerror = 1;
                }
            }
            $validatedDate = $this->validate([
                'name' => 'required',
                'email' => 'required',
                'message' => 'required',
            ]);
            Chats::create(['name'=>$this->name,'message'=>$this->message,'user_id'=>$this->user_id,'email'=>$this->email]);
            if($tryerror){
                Chats::create(['name'=>'GLC','message'=>"Please select topic again, you can just copy text from the option i gave.",'target_email'=>$this->email,'email'=>$this->email]);
            }

            if($setResource){
                Chats::create(['name'=>"GLC",'message'=>$setResource->content,'target_email'=>$this->email,'email'=>$this->email]);
            }
            $this->chatMessages = Chats::orWhere([['email', $this->email]])->get();
            $this->message ='';
        }catch(Exception $e){
        }
    }
}
