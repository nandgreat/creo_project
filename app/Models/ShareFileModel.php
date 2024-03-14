<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShareFileModel extends Model
{
    use HasFactory;
    public function fileData(){
        return $this->belongsTo(DocumentModel::class,'file_id','id');
    }
}
