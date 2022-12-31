<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Technician;
use Illuminate\Support\Facades\Hash;

class TechController extends Controller
{
  
    public function index(){
        
    }

    public function loginAuthentication(Request $req)
    {
        $remember_me = $req->remember_me == 'on' ? true : false;
      
        if(Auth::guard('techGuard')->attempt(['username'=>$req->username,'password'=>$req->password],$remember_me))
        {
            $req->session()->regenerate();
            $getUser = Technician::where('isActive',1)->find(Auth::guard('techGuard')->id());
            
            if($getUser != NULL)
            {
                return redirect('/dashboard');
            }

            return back()->withErrors(['The account you tried to login is inactive.']);
            
        }

        return back()->withErrors(['Incorrect Username or password.']);

    }

    public function manageTech()
    {
        $page = "technician";
        $technicians = Technician::all()->where('isActive',1);
        return view('admin.technician.manageTechnician',compact('page','technicians'));
    }


    public function create(Request $req)
    {
        $page = "technician";
        return view('admin.technician.createTechnician',compact('page'));
    }

    public function store(Request $req)
    {
        $req->isActive = 1;
        //check if username is exists then reject the registration;
        $check = Technician::where('username',$req->username)->count();
        if($check != 0)
        { 
            return back()->withErrors(['Username already exists! try using different username.']);

        }
        //check if the password is same as password confirm 
        elseif($req->password != $req->password_confirm)
        {
            return back()->withErrors(['Password phrase is not same as confirm password. please try again.']);
        }else {

        Technician::create([
            'full_name' => $req->fullname,
            'nickname' => $req->nickname,
            'profile_pic' => 'testpic.jpg',
            'username' => $req->username,
            'password' => Hash::make($req->password),
            'email' => $req->email,
            'isActive' => 1,
            'phone_no' => $req->phone_no
        ]);

        return redirect('/createTech')->with('success','Technician successfully registered!');
    }
}

    public function edit($id)
    {
        $page = "technician";
        $technician = Technician::findOrFail($id);
        return view('admin.technician.editTechnician',compact('page','technician'));
    }

    


    public function update(Request $req)
    {
        //check if username is exists then reject the registration;
        /*
        $check = Technician::where('username',$req->username)->count();
        if($check != 0)
        { 
            return back()->withErrors(['Username already exists! try using different username.']);

        }
*/
       $update_tech = Technician::find($req->id);
       $update_tech->full_name = $req->fullname;
       $update_tech->nickname = $req->nickname;
       $update_tech->email = $req->email;
       $update_tech->phone_no = $req->phone_no;
       $update_tech->profile_pic = "n/a";
       $update_tech->save();

       return back()->with('success','Technician successfully updated!');
    }

    public function editPassword()
    {
        $page = "resetPassword";
        return view('technician.editPassword.editPassword',compact('page'));
    }

    public function updatePassword(Request $req)
    {
        if(Auth::guard('techGuard')->check())
        {
            $tech = Technician::find(Auth::guard('techGuard')->id());
            //check if the password is same as password confirm 
            if($req->password != $req->password_confirm)
            {
                return back()->withErrors(['Password phrase is not same as confirm password. Please try again.']);
            
            }else{
            
            $tech->password = Hash::make($req->password);
            $tech->save();
            return back()->with('success','your password successfully updated!');
            
            }   
        }
       
    }

    public function resetPassword($id)
    {
        $tech = Technician::find($id);
        $tech->password = Hash::make(1234);
        $tech->save();
        return back()->with('success','technician password successfully updated!');
    }


    public function delete($id)
    {
        $tech = Technician::find($id);
        $tech->isActive = 0;
        $tech_name = $tech->full_name;    
        $tech->save();
        return redirect('/manageTech')->with('success',"Technician: $tech_name successfully deleted.");
     
    }

}
