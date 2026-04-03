<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;

class AdminController extends Controller
{
    function login(Request $request){

        $request->validate([
            "name" => "required",
            "password" => "required",
        ]);

        $admin = Admin::where([
            ['name',"=",$request->name],
            ['password',"=",$request->password],
        ])->first();

        if($admin){
            Session::put('admin', $admin);
            return redirect('dashboard');   // ✅ spelling fix
        }
        else{
            return back()->with('error', 'User does not found'); // ✅ correct handling
        }
    }

    function dashboard(){

        if(Session::has('admin')){
            $admin = Session::get('admin');   // ✅ get from session
            return view('admin', ["name"=>$admin->name]);
        }
        else{
            return redirect('admin-login');
        }
    }
}