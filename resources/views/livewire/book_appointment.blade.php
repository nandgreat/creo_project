<div class='row justify-content-center' style="margin-bottom: 200px;">
  <div class="col-md-8 " style="margin-top: 100px;">
    <form class='register'>
      <h1 class='customHeader text-center'>Appointment Booking Page</h1>
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
        <label class='check'>Choose a Date</label>
        <input type='date' wire:model="appointment_date" name='appointment_date' class='form-control' placeholder="Choose Date">
        @error('email') <span class="text-danger error">{{ $message }}</span>@enderror

      </div>
      <div class='form-group'>
        <label class='check'>First Name</label>
        <input type='text' wire:model="first_name" name='first_name' class='form-control' placeholder="Enter First Name">
        @error('first_name') <span class="text-danger error">{{ $message }}</span>@enderror
      </div>
      <div class='form-group'>
        <label class='check'>Last Name</label>
        <input type='text' wire:model="last_name" name='last_name' class='form-control' placeholder="Enter Last Name">
        @error('last_name') <span class="text-danger error">{{ $message }}</span>@enderror
      </div>
      <div class='form-group'>
        <label class='check'>Email</label>
        <input type='text' wire:model="email" name='email' class='form-control' placeholder="Enter Email">
        @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
      </div>
      <div class='form-group mb-2'>
        <label class='check'>Phone Number</label>
        <input type='number' wire:model="phone_number" name='phone_number' class='form-control' placeholder="Enter Phone Number">
        @error('phone_number') <span class="text-danger error">{{ $message }}</span>@enderror
      </div>
      <div class='form-group mb-2'>
        <label class='check'>Reference</label>
        <input type='number' wire:model="reference_number" name='reference_number' class='form-control' placeholder="Enter Reference Number">
        @error('reference_number') <span class="text-danger error">{{ $message }}</span>@enderror
      </div>
      <div class='form-group mb-2'>
        <label class='check'>Reason for Appointment</label>
        <input type='number' wire:model="appointment_reason" name='appointment_reason' class='form-control' placeholder="Enter Appointment Reason">
        @error('appointment_reason') <span class="text-danger error">{{ $message }}</span>@enderror
      </div>
      
      <div class='form-group mb-2'>
        <label class='check'>Additional Information</label>
        <textarea type='number' rows="4" wire:model="additional_information" name='additional_information' class='form-control' placeholder="Enter Additional Information"></textarea>
        @error('additional_information') <span class="text-danger error">{{ $message }}</span>@enderror
      </div>
      <div class='form-group mb-2'>

        <a class='btn btn-danger w-100' wire:click.prevent="login">Submit</a>
      </div>
      <div class='text-top-10'>

      </div>
    </form>
  </div>
</div>