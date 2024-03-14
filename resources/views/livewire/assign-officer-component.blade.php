



<div class='m-5'>
    <div class='form-container addresource'>
        <form >
        <h1 class='customHeader'>Assign Officers</h1>
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
            <label for="selectedUser">Select User:</label>
            <select id="selectedUser" name="selectedUser" wire:model='selectedUser' required class='form-control w-100'>
                <option value="">Select Users</option>
                @forelse ($users as $usersData)
                <option value="{{$usersData->id}}">{{$usersData->first_name}} {{$usersData->last_name}}</option>
                @empty
                @endforelse
            </select>
            @error('selectedUser') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label for="selectedOfficer">Select Officer:</label>
            <select id="selectedOfficer" name="selectedOfficer" wire:model='selectedOfficer' required class='form-control w-100'>
                <option value="">Select Officer</option>
                @forelse ($officers as $usersData)
                <option value="{{$usersData->id}}">{{$usersData->first_name}} {{$usersData->last_name}}</option>
                @empty
                @endforelse
            </select>
            @error('selectedOfficer') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
            <div class='form-group'>
                <a class='btn btn-primary w-100' wire:click.prevent="assign">Assign</a>
            </div>
        </form>
    </div>
</div>
@if($users)
<div class='table-responsive'>
<table class="table table-bordered container">
 <tr>
   <th>FirstName</th>
   <th>LastName</th>
   <th>Email</th>
   <th>Officer</th>
 </tr>
 @foreach ($users as $user)
  <tr>
    <td>{{ $user->first_name }}</td>
    <td>{{ $user->last_name }}</td>
    <td>{{ $user->email }}</td>
    <td>
        {{ @$user->first_name.' '.@$user->officer->last_name }}
    </td>
  </tr>
 @endforeach
</table>
</div>

@endif
