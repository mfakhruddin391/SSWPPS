<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status_dictionary extends Model
{
    use HasFactory;
    protected $table = 'status_dictionaries';
    protected $fillable = ['status_name','status_description'];

    public function task()
    {
        return $this->hasMany(Task::class,'task_progress_status_id','id');
    }

}
