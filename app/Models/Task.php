<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = 'tasks';
    protected $fillable = ['iotnet_id','task_description','admin_id','technician_id','task_progress_status_id','task_completed_report'];

    public function iotnet()
    {
        return $this->belongsTo(Iot_net::class,'iotnet_id','id');
    }

    public function Administrator()
    {
        return $this->belongsTo(Administrator::class,'admin_id','id');
    }


    public function Technician()
    {
        return $this->belongsTo(Technician::class,'technician_id','id');
    }

    public function Status_dictionary()
    {
        return $this->belongsTo(Status_dictionary::class,'task_progress_status_id','id');
    }
}
