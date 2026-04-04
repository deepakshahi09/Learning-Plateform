<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use Illuminate\Support\Facades\Redirect;

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
            Session::put('admin_id', $admin->id); // add this line
            return redirect('dashboard');
        }
        else{
            return back()->with('error', 'User does not found');
        }
    }

    function dashboard(){

        if(Session::has('admin')){
            $admin = Session::get('admin');
            return view('admin', ["name"=>$admin->name]);
        }
        else{
            return redirect('admin-login');
        }
    }

    function category()
    {
        if (Session::has('admin')) {
            $admin = Session::get('admin'); // use admin session
            return view('category', ["name" => $admin->name]);
        } else {
            return redirect('admin-login');
        }
    }
    function logout(){
        Session::forget('admin');
        return Redirect('admin-login');
    }

}