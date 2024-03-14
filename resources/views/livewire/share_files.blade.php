<div class='row justify-content-center' style="margin-bottom: 200px;">
  <div class="col-md-8 " style="margin-top: 100px;">
    <form class='register'>
      <h1 class='customHeader text-center'>SHARE CORRESPONDENCE</h1>
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
      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
      <div class='form-group'>
        <label class='check'>Recipent Name</label>
        <input type='password' wire:model="recipient_name" name='recipient_name' class='form-control' placeholder="Enter Recipient">
        @error('recipient_name') <span class="text-danger error">{{ $message }}</span>@enderror
      </div>
      <div class='form-group'>
        <label class='check'>Type Message</label>
        <textarea wire:model="message" name='message' class='form-control' placeholder="Type Message"></textarea>
        @error('message') <span class="text-danger error">{{ $message }}</span>@enderror
      </div>

      <div class='form-group mb-2'>
        <a class='btn btn-danger w-100' wire:click.prevent="login">Send</a>
      </div>

      <div class='text-top-10'>

      </div>
    </form>
  </div>
</div>