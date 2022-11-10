<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Iot_net;
use App\Models\Task;
use App\Models\Technician;
use App\Models\Completed_task_log;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function create()
    {
        $page = "task";
        $iotnets = Iot_net::all();
        return view('admin.task.createTask',compact('page','iotnets'));
    }

    public function store(Request $req)
    {
        Task::create([
            'iotnet_id' => $req->iotnetid,
            'task_description' => $req->description,
            'admin_id' => Auth::guard('adminGuard')->id(),
            'technician_id' => null,
            'task_progress_status_id' => 4,
            'task_completed_report' => ''
        ]);


        return redirect('/createTask')->with('success','Task successfully registered in the system');


    }

    public function manageTask()
    {
        $page = "task";
        $tasks = Task::where('task_progress_status_id','!=',3)->get();
        $technicians = Technician::all();
        $completedTasks = Task::where('task_progress_status_id',3)->get();
        return view('admin.task.manageTask',compact('page','tasks','technicians','completedTasks'));
    }

    public function assignTask(Request $req)
    {
        $page = "task";
        $task = Task::find($req->id);
        $task->technician_id =$req->tech_id;
        $task->task_progress_status_id = 1;
        $task->save();

        return redirect('/manageTask')->with('success','Task successfully assigned to technician');
    }



    public function distributedTask()
    {
        $page = "task";
        $tasks = Task::where('technician_id',Auth::guard('techGuard')->id())->where('task_progress_status_id',1)->get();
        $completedTasks = Task::where('technician_id',Auth::guard('techGuard')->id())->where('task_progress_status_id',3)->get();

        return view('technician.Task.distributedTask',compact('tasks','page','completedTasks'));
    }

    public function completeTask(Request $req)
    {
        $complete = Task::find($req->id);
        $complete->task_progress_status_id = 3;
        $complete->task_completed_report = $req->report;

        Completed_task_log::create([
            'admin_name' => $complete->administrator->full_name,
            'technician_name'=> $complete->technician->full_name,
            'iotnet_location_address' => $complete->iotnet->iotnet_location_address,
            'task_completed_report' => $complete->task_completed_report
        ]);
        $complete->save();

       
    return redirect('/distributedTask')->with('success','Report successfully submitted!');

    }
  
}
