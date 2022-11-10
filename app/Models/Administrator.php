<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Administrator extends Authenticatable
{
    use HasFactory;
    protected $guard = "adminGuard";
    protected $table = 'administrators';
    protected $fillable = ['full_name','profile_pic','username','password'];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function task()
    {
        return $this->hasMany(Task::class,'admin_id','id');
    }
}
