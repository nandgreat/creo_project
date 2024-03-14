



<div class='m-5'>
    <div class='form-container addresource'>
        <form >
        <h1 class='customHeader'>Users Management</h1>
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
            <input type='text' wire:model="first_name"  name='first_name' class='form-control' placeholder="First Name">
            @error('first_name') <span class="text-danger error">{{ $message }}</span>@enderror

        </div>
        <div class='form-group'>
            <input type='text' wire:model="last_name" name='last_name' class='form-control' placeholder="Last Name">
            @error('last_name') <span class="text-danger error">{{ $message }}</span>@enderror

        </div>
        <div class='form-group'>
            <input type='email' wire:model="email" name='email' class='form-control' placeholder="Email Address">
            @error('email') <span class="text-danger error">{{ $message }}</span>@enderror

        </div>
        <div class='form-group'>
            <input type='text' wire:model="password" name='password' class='form-control' placeholder="Password">
            @error('password') <span class="text-danger error">{{ $message }}</span>@enderror

        </div>
        <div class='form-group'>
            <input type='text' wire:model="comfirm_password" name='comfirm_password' class='form-control w-100' placeholder="Comfirm Password">
            @error('comfirm_password') <span class="text-danger error">{{ $message }}</span>@enderror

        </div>
          <div class="form-group">
            <label for="roles">Role:</label>
            <select id="roles" name="roles" wire:model='roles' required class='form-control w-100'>
              <option value="">Select Roles</option>
              <option value="admin">Admin</option>
              <option value="accountant">Accountant</option>
              {{-- <option value="guest-chat">Guest Chat</option> --}}
              <option value="users">Users</option>
            </select>
            @error('status') <span class="text-danger error">{{ $message }}</span>@enderror

          </div>


            <div class='form-group'>
@if(!$editID)
<a class='btn btn-primary w-100' wire:click.prevent="store">Save</a>
@else
<a class='btn btn-primary w-100' wire:click.prevent="update">Update</a>
@endif

            </div>

        </form>
    </div>
</div>
@if(!$user)
<div class='table-responsive'>
<table class="table table-bordered container">
 <tr>
   <th>No</th>
   <th>FirstName</th>
   <th>LastName</th>
   <th>Email</th>
   <th>Roles</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->first_name }}</td>
    <td>{{ $user->last_name }}</td>
    <td>{{ $user->email }}</td>
    <td>
        <label class="badge badge-success">{{ $user->roles }}</label>
    </td>
    <td>
       <a class="btn btn-primary" href="/admin/users/{{$user->id}}">Edit</a>
    </td>
  </tr>
 @endforeach
</table>
</div>

@endif
