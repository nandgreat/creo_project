<div class='row justify-content-center' style="margin-bottom: 200px;">
  <div class="col-md-8 " style="margin-top: 100px;">
    <form class='register'>
      <h1 class='customHeader text-center'>Change Password</h1>
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
      <div class='form-group'>
        <label class='check'>Old Password</label>
        <input type='password' wire:model="old_password" name='old_password' class='form-control' placeholder="Enter Old Password">
        @error('email') <span class="text-danger error">{{ $message }}</span>@enderror

      </div>
      <div class='form-group'>
        <label class='check'>New Password</label>
        <input type='password' wire:model="password" name='password' class='form-control' placeholder="Password">
        @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
      </div>
      <div class='form-group mb-2'>
        <label class='check'>Confirm New Password</label>
        <input type='password' wire:model="confirm_password" name='confirm_password' class='form-control' placeholder="Confirm Password">
        @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
      </div>
      <div class='form-group mb-2'>

        <a class='btn btn-danger w-100' wire:click.prevent="login">Submit</a>
      </div>
      <div class='text-top-10'>

      </div>
    </form>
  </div>
</div>
