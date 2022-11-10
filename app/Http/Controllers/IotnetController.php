<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Iot_net;
use App\Models\State;
use Illuminate\Support\Facades\Auth;
class IotnetController extends Controller
{
    

    public function create(){

        $page = 'sswpps-iot-net';
        $states = State::all();

        return view('admin.iotnet.createiotnet',compact('page','states'));

    }

    public function store(Request $req)
    {

        Iot_net::create([
            'iotnet_name' => $req->api_label,
            'iotnet_cloud_API' => $req->cloud_api,
            'iotnet_location_address' => $req->address,
            'iotnet_state_id' => (int)$req->state,
            
            'iotnet_torrential' => '',
            'iotnet_waterlvl' => '0',
            'createdBy' => Auth::guard('adminGuard')->id(),
        ]);

        return redirect('/createIotNet')->with('success','SSWPPS IoT-Net profile successfully registered!');


    }

    public function manageIotNet()
    {
        $page = 'sswpps-iot-net';
        $iotnets = Iot_net::all();
        return view('admin.iotnet.manageiot',compact('page','iotnets'));


    }


    public function liveStatus()
    {
        $page = 'sswpps-iot-net';
        $iotnets = Iot_net::all();
        return view('admin.iotnet.livestatus',compact('page','iotnets'));
    }

    public function edit($id)
    {
        $page = 'sswpps-iot-net';
        $iotnet = Iot_net::find($id);
        $states = State::all();
        
        //return $iotnet;
        return view('admin.iotnet.editiotnet',compact('page','iotnet','states'));
    }

    public function update(Request $req)
    {
        $page = 'sswpps-iot-net';
        $update_iot = Iot_net::find($req->id);
        
        $update_iot->iotnet_name = $req->api_label;
        $update_iot->iotnet_cloud_API = $req->cloud_api;
        $update_iot->iotnet_location_address = $req->address;
        $update_iot->iotnet_state_id = $req->state;
        $update_iot->save();

       return back()->with('success','SSWPPS-IoT Net profile successfully updated!');
    }

    public function delete($id)
    {
        $iotnet = Iot_net::find($id);
        $name = $iotnet->iotnet_name;    
        $iotnet->delete();
        return redirect('/manageIotNet')->with('success',"SSWPPS IoT-Net : $name successfully deleted.");
     
    }
}
