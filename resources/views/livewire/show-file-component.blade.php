<div class='m-5'>
   <h2>Shared Documents</h2>
    <div class='div-container-center '>
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


<div class="row w-100">


    <div class="col-sm-6 col-md-12 bg-grey ">
<div class='row'>

        @if ($filesShare)
        <div class="col-sm-6 col-md-12">
            <small>Files</small>
        <ul>
            @foreach ($filesShare as $folderData)
                <li> <span><i class='fa fa-file text-secondary'></i> {{$folderData->fileData->name}} </span>  <a target="_blank" href="{{str_replace('public','storage',$folderData->fileData->path)}}"><i class='fa fa-download text-secondary'></i> Download</a></li>
            @endforeach
        </ul>
    </div>
        @endif
        @if (!$filesShare)
            <p>Empty Directory</p>
        @endif
</div>
    </div>
</div>


    </div>
</div>
