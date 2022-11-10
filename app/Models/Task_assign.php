<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task_assign extends Model
{
    use HasFactory;
    protected $table = 'task_assigns';
    protected $fillable = ['admin_id','technician_id','task_id','technician_decision','reject_reason','task_progress_status_id','task_completed_report'];

    public function Administrator()
    {
        return $this->belongsTo(Administrator::class,'admin_id','id');
    }

    public function Technician()
    {
        return $this->belongsTo(Technician::class,'technician_id','id');
    }

    public function Task()
    {
        return $this->belongsTo(Task::class,'task_id','id');
    }

    public function Status_dictionary()
    {
        return $this->belongsTo(Status_dictionary::class,'task_progress_status_id','id');
    }
}
