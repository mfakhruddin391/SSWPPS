<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Completed_task_log extends Model
{
    use HasFactory;

    protected $table = 'completed_task_logs';
    protected $fillable = ['admin_name','technician_name','iotnet_location_address','task_completed_report'];


    
}
