<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Technician extends Authenticatable
{
    use HasFactory;
    protected $table = 'technicians';
    protected $fillable = ['full_name','nickname','profile_pic','username','password','email','isActive','phone_no'];

    public function task()
    {
        return $this->hasMany(Task_assign::class,'technician_id','id');
    }

    
}
