<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use Illuminate\Support\Facades\Redirect;
use App\Models\Category;

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
        $categories = Category::all();
        
        if (Session::has('admin')) {
            $admin = Session::get('admin'); // use admin session
           return view('category', [
        "name" => $admin->name,
        "categories" => $categories
    ]);
        } else {
            return redirect('admin-login');
        }
    }
    function logout(){
        Session::forget('admin');
        return Redirect('admin-login');
    }


  function addCategory(Request $request){

    $admin = Session::get('admin');

    $category = new Category();
    $category->name = $request->category;
    $category->creator = $admin->name;

    if($category->save()){
        Session::flash('category', $request->category . " Added");
    }

    return redirect('admin-category');
}

}