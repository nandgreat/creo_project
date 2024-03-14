<div class='m-5'>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class='row '>
        <div class='col-sm-6 col-md-4 text-center'><span  wire:click='initialFolder'><i class='fa fa-folder text-danger'></i> Folder</span></div>
        <div class='col-sm-6 col-md-4 text-center'><span wire:click='viewAllFile'><i class='fa fa-file text-danger'  ></i> Documents</span></div>
        <div class='col-sm-6 col-md-4 text-center'><span ><i class='fa fa-download text-danger'></i> Download</span></div>
    </div>
    <div class='div-container-center '>
        {{-- <h1 class='customHeader'>Resource</h1> --}}
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        </div>
        @if ($isChecked)

        <div class="row w-100">

            <div class="col-sm-6 col-md-3"></div>
            <div class="col-sm-6 col-md-6">
                <select multiple class='form-control' wire:model='receipient'>
                    <option value=''>Select users to Assign files to</option>
                    @forelse ($myCustomers as $data)
                        <option value="{{$data->id}}">{{$data->first_name.' '.$data->last_name}}</option>
                    @empty

                    @endforelse
                </select>

            </div>
            <div class="col-sm-6 col-md-3">
                <button wire:click='share'>Share<i class='fa fa-share'></i></button>
            </div>

        </div>
        @endif

<div class="row w-100">

    <div class="col-sm-6 col-md-3">
    @if ($createFolderEnable)

        <div class="form-group">
            <label for="title">Input Folder Name:</label>
            <input type="text"  wire:model='foldername' class='form-control' required>
            @error('foldername') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
            <div class='form-group'>
                <a class='btn btn-primary w-100' wire:click.prevent="createFolder">Create</a>
            </div>
            <hr>
            @if($selectedFolder)
            <form >
                <div class='form-group'>
                <input type="file" wire:model="file">
                </div>
            <div class='form-group'>
                <a class='btn btn-primary w-100' wire:click="upload"><i class='fa fa-upload'></i></a>
            </div>
        </form>
        @endif
    @endif

    </div>

    <div class="col-sm-6 col-md-9 bg-grey ">
<div class='row'>
        @if ($folders)
        <div class="col-sm-6 col-md-6">
            <small>Folder</small>
        <ul>
            @foreach ($folders as $folderData)
            <li wire:click='viewFile({{$folderData->id}})'><i class='fa fa-folder text-pr'></i> {{$folderData->name}}</li>
            @endforeach
        </ul>
        </div>
        @endif
        @if ($folderFiles)
        <div class="col-sm-6 col-md-6">
            <small>Files</small>
        <ul>
            @foreach ($folderFiles as $folderData)
                <li><input type="checkbox" wire:change="checkboxChanged" wire:model="selectedFile" value="{{ $folderData->id }}"> <span><i class='fa fa-file text-secondary'></i> {{$folderData->name}} </span>  <a target="_blank" href="{{str_replace('public','storage',$folderData->path)}}"><i class='fa fa-download text-secondary'></i> Download</a></li>
            @endforeach
        </ul>
    </div>
        @endif
        @if (!$folderFiles && !$folders)
            <p>Empty Directory</p>
        @endif
</div>
    </div>
</div>


    </div>
</div>
