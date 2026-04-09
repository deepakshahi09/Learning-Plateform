<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Quiz;
use App\Models\Mcq;
use App\Models\User;


class UserController extends Controller
{
    //
    function welcome(){
    $categories = Category::withCount('quizzes')->get();

    return view('welcome',['categories'=>$categories]);
}

function userQuizList($id, $category){

   $quizData = Quiz::withCount('Mcq')->where('category_id', $id)->get();

    return view('user-quiz-list', [
        "quizData" => $quizData,
        "category" => $category
    ]);
}
function startQuiz($id,$name){

    $quizCount = Mcq::where('quiz_id',$id)->count();
    $mcqs = Mcq::where('quiz_id',$id)->get();
   
    Session::put('firstMCQ',$mcqs[0]);

    $quizName = $name;

    return view('start-quiz',[
        'quizName'=>$quizName,
        'quizCount'=>$quizCount
    ]);
}

public function userSignup(Request $request)
{
    $request->validate([
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:3|confirmed',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password)
    ]);

    if($user){
        Session::put('user',$user);
        if(Session::has('quiz-url')){
            $url = Session::get('quiz-url');
            Session::forget('quiz-url');
            return redirect($url);
        }
        return redirect('/');
    }
}
function userLogout(){
    Session::forget('user');
    return redirect('/');
}
function userSignupQuiz(){
    Session::put('quiz-url', url()->previous());
    return view('user-signup');
}

function userLogin(Request $request){

    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    // ❌ Invalid user
    if(!$user || !Hash::check($request->password, $user->password)){
        return back()->with('error', 'Invalid email or password');
    }

    // ✅ Login success
    Session::put('user', $user);

    if(Session::has('quiz-url')){
        $url = Session::get('quiz-url');
        Session::forget('quiz-url');
        return redirect($url); // ✅ return added
    }

    return redirect('/');
}

function userLoginQuiz(){

    // previous URL store karo
    Session::put('quiz-url', url()->previous());

    return view('user-login');
}
function mcq($id,$name){
    return view('mcq-page');
}


}
