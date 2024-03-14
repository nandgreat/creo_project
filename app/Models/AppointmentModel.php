<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentModel extends Model
{
    use HasFactory;
    public function Target(){
        return $this->belongsTo(User::class,'target_id','id');
    }
    public function Initiator(){
        return $this->belongsTo(User::class,'initiator_id','id');
    }
}
