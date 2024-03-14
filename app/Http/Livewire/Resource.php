<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Resource as ResourceModel;
class Resource extends Component
{
    public $title,$content,$status,$data,$showform=false,$ResourceId;
    public function __construct(){
        $this->show();
    }


    public function render()
    {
        return view('livewire.resource');
    }
    public function toggleState(){
        $this->showform = !$this->showform;
    }
    public function show(){
        $this->data = ResourceModel::orderBy('id','desc')->get();
    }
    public function store()
    {
        try{
            $validatedDate = $this->validate([
                'title' => 'required',
                'content' => 'required',
                'status' => 'required',
            ]);
            ResourceModel::create(['title'=>$this->title,'content'=>$this->content,'status'=>$this->status,'user_id'=>auth()->user()->id]);
            $this->emit('recordTable');
            session()->flash('message', "Record Saved.");
        }catch(Exception $e){
            session()->flash('error', $e->getMessage());
        }
    }
    public function edit($id){
        Livewire::debug('Editing resource with ID: ' . $id);
        Livewire::dispatchBrowserEvent('livewire-log', 'Editing resource with ID: ' . $id);
        $selectedResource = ResourceModel::findorfail($id);
        $this->ResourceId = $selectedResource->id;
        $this->title = $selectedResource->title;
        $this->content = $selectedResource->content;
        $this->status = $selectedResource->status;
    }
    public function destroy($id)
    {
        try{
            ResourceModel::findorfail($id)->destroy();
            $this->emit('recordTable');
            session()->flash('message', "Record Deleted.");
        }catch(Exception $e){
            session()->flash('error', $e->getMessage());
        }
    }
}
