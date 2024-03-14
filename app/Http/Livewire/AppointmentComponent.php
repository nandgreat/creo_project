<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\AppointmentModel;
use App\Models\User;

class AppointmentComponent extends Component
{
    public $myAppointment,$users,$auth,$targetUser=null,$title,$appointment_date,$start_time,$end_time,$description,$viewAppointment;
    public function mount(){
        $this->auth = auth()->user();
        if($this->auth->accountType == 'Users'){
            if($this->auth->officer_id != null){
                $this->targetUser =$this->auth->officer_id;
            }
        }else{
            $this->users=User::where('officer_id',$this->auth->id)->where('accountType','Users')->get();
        }
        $this->viewAppointment = true;
        $this->myAppointment = AppointmentModel::where('initiator_id',$this->auth->id)->orWhere('target_id',$this->auth->id)->get();
    }
    public function render()
    {
        return view('livewire.appointment-component')->layout('layouts.app',[
            'page' => "Book Appointment",
        ]);
    }
    public function store(){
        $validatedDate = $this->validate([
            'title' => 'required',
            'description' => 'required',
            'appointment_date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);
        if(!$this->targetUser){
            session()->flash('error', 'No account officer found.');
            return false;
        }
        $appointmentModel =new AppointmentModel;
        $appointmentModel->title = $this->title;
        $appointmentModel->description = $this->description;
        $appointmentModel->appointment_date = $this->appointment_date;
        $appointmentModel->start_time = $this->start_time;
        $appointmentModel->end_time = $this->end_time;
        $appointmentModel->initiator_id = $this->auth->id;
        $appointmentModel->status = 'pending';
        $appointmentModel->target_id = $this->targetUser;
        $appointmentModel->save();
        $this->myAppointment = AppointmentModel::where('initiator_id',$this->auth->id)->orWhere('target_id',$this->auth->id)->get();
        session()->flash('message', 'Appointment Booked successfully.');

    }
    public function setTargetUser($id){
        $this->targetUser = $id;
    }
    public function viewAddAppointment($logic){
        $this->viewAppointment = $logic;
    }
    public function accept($id){
        $appro = AppointmentModel::where(['id'=>$id,'target_id'=>$this->auth->id])->first();
        $appro->status = 'Accepted';
        $appro->save();
        $this->myAppointment = AppointmentModel::where('initiator_id',$this->auth->id)->orWhere('target_id',$this->auth->id)->get();

    }
    public function rejected($id){
        $appro = AppointmentModel::where(['id'=>$id,'target_id'=>$this->auth->id])->first();
        $appro->status = 'rejected';
        $appro->save();
        $this->myAppointment = AppointmentModel::where('initiator_id',$this->auth->id)->orWhere('target_id',$this->auth->id)->get();

    }
    public function cancel($id){
        $appro = AppointmentModel::where(['id'=>$id,'initiator_id'=>$this->auth->id])->first();
        $appro->status = 'cancelled';
        $appro->save();
        $this->myAppointment = AppointmentModel::where('initiator_id',$this->auth->id)->orWhere('target_id',$this->auth->id)->get();

    }

}
