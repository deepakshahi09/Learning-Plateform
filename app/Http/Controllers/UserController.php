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
use App\Models\Record;
use App\Models\MCQ_Record;


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

function mcq($id, $name)
{
    // check session
    $firstMCQ = Session::get('firstMCQ');

    if (!$firstMCQ) {
        return redirect('/')->with('error', 'Session expired');
    }

    // save record
    $record = new Record();
    $record->user_id = Session::get('user')->id;
    $record->quiz_id = $firstMCQ->quiz_id;
    $record->status = 1;

    if ($record->save()) {

        $currentQuiz = [];

        // total questions
        $currentQuiz['totalMcq'] = Mcq::where('quiz_id', $firstMCQ->quiz_id)->count();

        // current question
        $currentQuiz['currentMcq'] = 1;

        $currentQuiz['quizName'] = $name;
        $currentQuiz['quizId'] = $firstMCQ->quiz_id;
        $currentQuiz['recordId'] = $record->id;

        // store in session
        Session::put('currentQuiz', $currentQuiz);

        // get question
        $mcqData = Mcq::find($id);

        if (!$mcqData) {
            return redirect('/')->with('error', 'Question not found');
        }

        return view('mcq-page', [
            'quizName' => $name,
            'mcqData' => $mcqData
        ]);

    } else {
        return "Something went wrong";
    }
}

public function submitAndNext(Request $request, $id)
{
    $currentQuiz = Session::get('currentQuiz');

    // increase question number
    $currentQuiz['currentMcq'] += 1;

    // get next question
    $mcqData = Mcq::where([
        ['id', '>', $id],
        ['quiz_id', '=', $currentQuiz['quizId']]
    ])->first();
    $isExist = MCQ_Record::where([
    ['record_id', '=', $currentQuiz['recordId']],
    ['mcq_id', '=', $request->id],
    ])->count();


    if($isExist < 1){
        $mcq_record = new MCQ_Record;
    $mcq_record->record_id = $currentQuiz['recordId'];
    $mcq_record->user_id = Session::get('user')->id;
    $mcq_record->mcq_id = $request->id;
    $mcq_record->select_answer = $request->option;
    $mcq = MCQ::find($request->id);
    if (!$mcq) {
        return "MCQ not found";
    }
    $correctAnswer = strtolower(trim($mcq->correct_answer));
    $userAnswer = strtolower(trim($request->option));

    if ($userAnswer === $correctAnswer) {
        $mcq_record->is_correct = 1;
    } else {
        $mcq_record->is_correct = 0;
    }
    if (!$mcq_record->save())
    {
        return "something went wrong";
    }
    }
    // ❗ safety check (last question)
    if (!$mcqData) {
        $resultData = MCQ_Record::WithMCQ()->where('record_id',$currentQuiz['recordId'])->get();

        $correctAnswer = MCQ_Record::where([
    ['record_id', '=', $currentQuiz['recordId']],
    ['is_correct', '=', 1],
      ])->count();

        $record = Record::find( $currentQuiz['recordId']);
        if($record){
            $record->status = 2;
            $record->update();
        }


        return view('quiz-result',['resultData'=>$resultData,'correctAnswer'=>$correctAnswer]);
    }
    // update session
    Session::put('currentQuiz', $currentQuiz);

    return view('mcq-page', [
        'quizName' => $currentQuiz['quizName'],
        'mcqData' => $mcqData
    ]);
}
function userDetails(){
    $quizRecord = Record::withQuiz()->where('user_id',Session::get('user')->id)->get();
    return view('user-details',['quizRecord'=> $quizRecord]);
}


}
