<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Administrator;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function loginAuthentication(Request $req)
    {
        $remember_me = $req->remember_me == 'on' ? 1 : 0;
        
        
        if(Auth::guard('adminGuard')->attempt(['username'=>$req->username,'password'=>$req->password],$remember_me))
        {
           
            $req->session()->regenerate();
            $getUser = Administrator::find(Auth::guard('adminGuard')->id());
        
            return redirect('/dashboard');
        }

        return back()->withErrors(['Incorrect Username or password.']);
    }
}
