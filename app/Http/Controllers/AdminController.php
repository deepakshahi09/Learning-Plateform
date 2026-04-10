<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use Illuminate\Support\Facades\Redirect;
use App\Models\Category;
use App\Models\Quiz;
use App\Models\Mcq;


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
           // return redirect('admin-login');
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
    $validation = $request->validate([
        "category"=>"required | min:3 | unique:categories,name"
    ]);

    $admin = Session::get('admin');

    $category = new Category();
    $category->name = $request->category;
    $category->creator = $admin->name;

    if($category->save()){
        Session::flash('category', $request->category . " Added");
    }

    return redirect('admin-category');
    }


    function deleteCategory($id)
{
    $category = Category::find($id);

    if($category){
        $name = $category->name; 
        $category->delete();

        Session::flash('category', $name . " Deleted");
    }

    return redirect('admin-category');
}
function addQuiz(Request $request){

    if(!Session::has('admin')){
        return redirect('admin-login');
    }

    $admin = Session::get('admin');
    $categories = Category::get();
    $totalMCQs = 0;

    if($admin){

        $quizName = $request->quiz;
        $category_id = $request->category_id;

        // 🔥 FIX: remove old session and always allow new quiz
        if($quizName && $category_id){

            Session::forget('quizDetails'); // IMPORTANT

            $quiz = new Quiz();
            $quiz->name = $quizName;
            $quiz->category_id = $category_id;

            if($quiz->save()){
                Session::put('quizDetails',$quiz);
            }
        }

        // MCQ count
        if(Session::has('quizDetails')){
            $quiz = Session::get('quizDetails');
            $totalMCQs = Mcq::where('quiz_id', $quiz->id)->count();
        }

        return view('add-quiz', [
            "name" => $admin->name,
            "categories" => $categories,
            "totalMCQs"=>$totalMCQs
        ]);
    }

    return redirect('admin-login');
}
function AddMCQs(Request $request){
     $request->validate([
        "question" => "required|min:5",
        "a" => "required",
        "b" => "required",
        "c" => "required",
        "d" => "required", 
        "correct_answer" => "required"
    ]);
    $mcq = new Mcq();
    $quiz = Session::get('quizDetails');
    $admin = Session::get('admin');

   $mcq->question = $request->question;
    $mcq->a = $request->a;
    $mcq->b = $request->b;
    $mcq->c = $request->c;
    $mcq->d = $request->d;
    $mcq->correct_answer = $request->correct_answer;

    $mcq->admin_id = $admin->id;
    
    
    $mcq->quiz_id = session('quizDetails')->id;
    $mcq->category_id = session('quizDetails')->category_id;

    if($mcq->save()){
        if($request->submit == "add-more"){
            return redirect(url()->previous());

        }
        else{
            Session::forget('quizDetails');
            return redirect("/admin-category");
        }
    }
}
function endQuiz(){
    Session::forget('quizDetails');
    return redirect("/admin-category");
}

function showQuiz($id , $quizName){

    if(!Session::has('admin')){
        return redirect('admin-login');
    }

    $admin = Session::get('admin');

    // MCQs fetch karo
    $mcqs = Mcq::where('quiz_id', $id)->get();
    return view('show-quiz', [
        "name" => $admin->name,
        "mcqs" => $mcqs
        
    ]);

}
function quizList($id, $category){

    if(!Session::has('admin')){
        return redirect('admin-login');
    }

    $admin = Session::get('admin');

    // ✅ data fetch karo
   $quizData = Quiz::where('category_id', $id)->get();

    return view('quiz-list', [
        "name" => $admin->name,
        "quizData" => $quizData,
        "category" => $category
    ]);
}



}