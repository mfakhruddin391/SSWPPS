<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iot_net extends Model
{
    use HasFactory;
    protected $table = 'iot_nets';
    protected $fillable = ['iotnet_name','iotnet_cloud_API','iotnet_location_address',
    'iotnet_state_id','iotnet_status','iotnet_torrential','iotnet_waterlvl','createdBy','updatedBy'];

    public function Task()
    {
        return $this->hasMany(Task::class,'iot_net_id','id');
    
    
    }

    public function Status_dictionary()
    {
        return $this->belongsTo(Status_dictionary::class,'iotnet_status','id');
    }

    public function State()
    {
        return $this->belongsTo(State::class,'iotnet_state_id','id');
    }


}
