

 <div class='m-5'>
    <div class='form-container addresource'>
        <form >
        <h1 class='customHeader'>Resource</h1>
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
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" wire:model='title' class='form-control' required>
            @error('title') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea class="rich-text-editor" contenteditable="true" wire:model='content' name="content"></textarea>
            @error('content') <span class="text-danger error">{{ $message }}</span>@enderror

          </div>
          <div class="form-group">
            <label for="status">Status:</label>
            <select id="status" name="status" wire:model='status' required>
              <option value="">Select status</option>
              <option value="1">Active</option>
              <option value="0">Inactive</option>
            </select>
            @error('status') <span class="text-danger error">{{ $message }}</span>@enderror

          </div>


            <div class='form-group'>
                <a class='btn btn-primary w-100' wire:click.prevent="store">Save</a>
            </div>

        </form>
    </div>
</div>
{{-- @endif --}}
<div class='table-responsive '>
<table class='table container' wire:poll.5000ms="show">
    <thead>
        <tr>
            <th>Title</th>
            <th>Status</th>
            <th>Content</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
@if ($data)
    @foreach ($data as $Rdata)
    <tr>
        <td>{{$Rdata->title}}</td>
        <td>{{$Rdata->status?'Active':'Disabled'}}</td>
        <td>{{substr($Rdata->content, 0, 20)}}</td>
        <td><a class='btn btn-danger' wire:click="destroy('{{$Rdata->id}}')"><i class='fa fa-trash'></i>Delete</a><button type='button' class='btn btn-warning' wire:click="edit('{{$Rdata->id}}')"><i class='fa fa-pen'></i>Edit</button></td>
    </tr>

    @endforeach
@endif
</tbody>
</table>
</div>
@push('scripts')
<script> CKEDITOR.replace( 'content' );
window.addEventListener('livewire-log', event => {
    console.log(event.detail);
});
    </script>
@endpush

