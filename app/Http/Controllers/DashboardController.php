<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Administrator;
use App\Models\Technician;
use App\Models\Iot_net;
use App\Models\Task;
use App\Models\Completed_task_log;

class DashboardController extends Controller
{
    private $redirect = '';

    public function index()
    {
        $dashboardContent = [];
        $getUser = "";
        $page = "dashboard";
        if(Auth::guard('adminGuard')->check())
        {
        $getUser = Administrator::find(Auth::guard('adminGuard')->id());
        $redirect = 'admin.dashboard.dashboardAdmin';

        $dashboardContent['totalTechnician'] = Technician::count();
        $dashboardContent['totalUnassignedTask'] = Task::where('task_progress_status_id',4)->count();
        $dashboardContent['iotImplemented'] = IoT_net::count();
        $dashboardContent['completedTaskLog'] = Task::where('task_progress_status_id',3)->count();
        }
        elseif(Auth::guard('techGuard')->check())
        {
        $getUser = Technician::find(Auth::guard('techGuard')->id());
        $redirect = 'technician.dashboard.dashboardTech';
        $dashboardContent['newTask'] = Task::where('technician_id',Auth::guard('techGuard')->id())->count();
        $dashboardContent['CompletedTask'] = Task::where('technician_id',Auth::guard('techGuard')->id())->where('task_progress_status_id',3)->count();
        $dashboardContent['iotImplemented'] = IoT_net::count();
        }else{

            return back()->withErrors(['you are not authorize to access the page']);

        }

        session()->put('full_name',$getUser->full_name);

        return view($redirect,compact('getUser','page','dashboardContent'));

    }

    public function logout(Request $req)
    {
        $redirect = "";
        if(Auth::guard('adminGuard')->check())
        {
        Auth::guard('adminGuard')->logout();
        $redirect = 'admin';
        }
        elseif(Auth::guard('techGuard')->check())
        {
        Auth::guard('techGuard')->logout();
        $redirect = '/';
        }
        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect($redirect)->with('success','Successfully Logout');
        
    }
}
