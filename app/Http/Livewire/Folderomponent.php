<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\FolderModel;
use App\Models\DocumentModel;
use App\Models\ShareFileModel;
use App\Models\User;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
class Folderomponent extends Component
{
    use WithFileUploads;
    public $auth,$file,$foldername,$selectedFolder,$folders,$folderFiles,$createFolderEnable=true;
    public $selectedFile=[],$receipient=[],$myCustomers,$isChecked=false;
    public function mount(){
        $this->folders = FolderModel::whereNull('folder_id')->get();
    }
    public function render()
    {
        $this->auth =auth()->user();
        return view('livewire.folderomponent')->layout('layouts.app',[
            'page' => "File Management ",
        ]);
    }
    public function createFolder(){
        $validatedDate = $this->validate([
            'foldername' => 'required',
        ]);
        $folderModel =new FolderModel;
        $folderModel->name =$this->foldername;
        $folderModel->created_by =auth()->user()->id;

        $folderModel->folder_id =($this->selectedFolder)??null;
        $folderModel->save();
        session()->flash('message', 'Folder Created successfully.');
    }

    public function upload(){
        $path =$this->file->store('public/uploads');
        $fileSize = $this->file->getSize();
        $fileType = $this->file->getMimeType();
        $fileName = $this->file->getClientOriginalName();
        $url = storage_path('app/public/uploads/' . $fileName);
        $documentModel =new DocumentModel;
        $documentModel->name = $fileName;
        $documentModel->path =$path;
        $documentModel->url =$url;
        $documentModel->type =$fileType;
        $documentModel->size =$fileSize;
        $documentModel->folder_id =$this->selectedFolder;
        $documentModel->created_by =auth()->user()->id;
        $documentModel->save();
        session()->flash('message', 'File uploaded successfully.');
    }
    public function viewFile($id){
        $this->createFolderEnable=true;

        $this->selectedFolder =$id;
        $this->folders =($this->selectedFolder)?FolderModel::where('folder_id',$this->selectedFolder)->get(): FolderModel::whereNull('folder_id')->get();
        $this->folderFiles =DocumentModel::where('folder_id',$this->selectedFolder)->get();
    }
    public function viewAllFile(){
        $this->folderFiles =DocumentModel::all();
        $this->folders =null;
        $this->createFolderEnable=false;
    }
    public function viewAllFolder(){
        $this->folderFiles =FolderModel::all();
        $this->createFolderEnable=true;

    }
    public function return(){
        $this->selectedFolder =null;
    }
    public function initialFolder(){
        $this->folders = FolderModel::whereNull('folder_id')->get();
        $this->folderFiles =null;
        $this->createFolderEnable=true;

    }
    public function checkboxChanged()
    {
        // Perform any actions or updates based on the checkbox value
        if (count($this->selectedFile) > 0) {
            $this->isChecked =true;
            $this->myCustomers = User::where(['accountType'=>'Users','officer_id'=>$this->auth->id])->get();
            // Checkbox is checked
            // Do something...
        } else {
            $this->isChecked =false;
            // Checkbox is unchecked
            // Do something else...
        }
    }
    public function share(){
        if (count($this->selectedFile) > 0 && count($this->receipient) > 0) {
            foreach ($this->selectedFile as $itemId) {
             //     // Handle the selected item with $itemId
             //     // Do something...
                foreach($this->receipient as $recId){
                    $shareFileModel =new ShareFileModel;
                    $shareFileModel->user_id =$recId;
                    $shareFileModel->file_id =$itemId;
                    $shareFileModel->created_by =$this->auth->id;
                    $shareFileModel->save();
                }
            }
        session()->flash('message', 'File shared successfully.');
        }
    }
}
