<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ShareFileModel;

class ShowFileComponent extends Component
{
    public $filesShare,$auth;
    public function mount(){
        $auth = auth()->user();
        $this->filesShare = ShareFileModel::where('user_id',$auth->id)->get();
    }
    public function render()
    {
        return view('livewire.show-file-component')->layout('layouts.app',[
            'page' => "Share Document",

        ]);
    }
}
