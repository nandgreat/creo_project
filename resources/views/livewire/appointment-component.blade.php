<div class='m-5'>
    <div class='text-right'>

        <button class='btn btn-primary' wire:click='viewAddAppointment(true)'>View Appointments</button>
        <button class='btn btn-primary' wire:click='viewAddAppointment(false)'>Book Appointment</button>

</div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
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
@if (!$viewAppointment)
<div class="row w-100">

    <div class="col-sm-6 col-md-10 ">
        <form >
            @if($users)
            <div class='form-group w-50'>
                <label>Select User {{$targetUser}}</label>
                <select  class='form-control' wire:model='targetUser' >
                    <option>Select User</option>
                    @forelse ($users as $userdata)
                        <option value="{{$userdata->id}}">{{$userdata->first_name.' '.$userdata->last_name}}</option>
                    @empty
                    @endforelse
                </select>
            </div>
            @endif
            <div class='form-group w-50'>
                <label>Title </label>
                <input type='text'  class='form-control' wire:model='title' placeholder="Title">
            </div>
            <div class='form-group row'>
                <label>Date Of Appointment</label>
                <div class="col-sm-6 col-md-6 ">
                <input type="date" class="form-control" wire:model='appointment_date' placeholder="Date">
                </div>
            </div>
            <div class='form-group row'>
                <div class="col-sm-6 col-md-6 ">
                <label>Start Time</label>
                    <input type="time" class="form-control" wire:model='start_time' placeholder="Time">
                </div>
                <div class="col-sm-6 col-md-6 ">
                    <label>End Time</label>
                <input type="time" class="form-control" wire:model='end_time' placeholder="Time">
                </div>
            </div>
            <div class='form-group'>
                <label>Enter Purpose for Appointment</label>

                <textarea class='form-control' wire:model='description'></textarea>
            </div>
        <div class='form-group'>
            <a class='btn btn-primary w-100' wire:click='store'>Book</a>
        </div>
    </form>
    </div>
</div>
@else

<div class='table-responsive p-5'>
    <table class='table table-striped"'>
        <thead>
            <tr>
                <td>Title</td>
                <td>Day</td>
                <td>From</td>
                <td>To</td>
                <td>Description</td>
                <td>Initiator</td>
                <td>Target User</td>
                <td>Status</td>
                <td>Action</td>

            </tr>
        </thead>
        <tbody>
            @if ($myAppointment)
                @forelse ($myAppointment as $myAppointmentData)
                    <tr>
                        <td>{{$myAppointmentData->title}}</td>
                        <td>{{$myAppointmentData->appointment_date}}</td>
                        <td>{{$myAppointmentData->start_time}}</td>
                        <td>{{$myAppointmentData->end_time}}</td>
                        <td>{{$myAppointmentData->description}}</td>
                        <td>{{$myAppointmentData->Initiator->first_name.' '.$myAppointmentData->Initiator->last_name}}</td>
                        <td>{{$myAppointmentData->Target->first_name.' '.$myAppointmentData->Target->last_name}}</td>
                        <td>@if ($myAppointmentData->status == 'rejected')
                            <span class='badge badge-danger text-light bg-danger'>{{$myAppointmentData->status}}</span>
                            @elseif ($myAppointmentData->status == 'pending')
                            <span class='badge badge-warning text-dark bg-warning'>{{$myAppointmentData->status}}</span>
                            @elseif ($myAppointmentData->status == 'cancelled')
                            <span class='badge badge-warning text-light bg-danger'>{{$myAppointmentData->status}}</span>

                            @else
                            <span class='badge badge-success text-light bg-success'>{{$myAppointmentData->status}}</span>

                        @endif</td>
                        <td>

                            @if ($myAppointmentData->initiator_id != $auth->id && $myAppointmentData->status != 'cancelled')
                            <button class='btn btn-danger' wire:click='rejected({{$myAppointmentData->id}})'>Reject</button>
                            <button class='btn btn-success' wire:click='accept({{$myAppointmentData->id}})'>Accept</button>
                            @else
                            @if ($myAppointmentData->status != 'cancelled')
                            <button class='btn btn-danger' wire:click='cancel({{$myAppointmentData->id}})'>Cancel</button>
                            @else
                            <button class='btn btn-danger' disabled >Cancel</button>

                            @endif

                            @endif

                        </td>
                    </tr>
                @empty

                @endforelse
            @endif

        </tbody>
    </table>
</div>
@endif



    </div>
</div>
