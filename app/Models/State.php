<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $fillable = ['state_name'];

    
    public function Iot_net()
    {
        return $this->hasMany(Iot_net::class,'iotnet_state_id','id');
    }

    public function Country()
    {
        return $this->belongsTo(Country::class,'country_id','id');
    }
}
