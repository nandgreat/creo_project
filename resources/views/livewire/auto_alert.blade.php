<div class='row justify-content-center' style="margin-bottom: 200px;">
  <div class="col-md-8 " style="margin-top: 100px;">
    <form class='register'>
      <h1 class='customHeader text-center'>Auto Alert Setup</h1>
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
        <label class='check'>Alert Name</label>
        <input type='password' wire:model="old_password" name='old_password' class='form-control' placeholder="Enter Alert Name">
        @error('email') <span class="text-danger error">{{ $message }}</span>@enderror

      </div>
      <div class='form-group'>
        <label class='check'>Date/Time</label>
        <input type='date' wire:model="password" name='password' class='form-control' placeholder="Select Date/Time">
        @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
      </div>
      <div class='form-group mb-2'>
        <label class='check'>Alert Interval</label>
        <input type='text' wire:model="confirm_password" name='confirm_password' class='form-control' placeholder="Alert Interval">
        @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
      </div>

      <h4 style="margin-top: 50px;">Model of Reminder</h4>
      <hr>

      <div class='form-group mb-2'>
        <label class='check'>Email</label>
        <input type='text' wire:model="confirm_password" name='confirm_password' class='form-control' placeholder="Enter Email">
        @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
      </div>
      <div class='form-group mb-2'>
        <label class='check'>Phone Number</label>
        <input type='tel' wire:model="phone_number" name='confirm_paphone_numberssword' class='form-control' placeholder="Phone Number">
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