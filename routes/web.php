<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;

Route::get('/',[UserController::class,'welcome']);
Route::get('user-quiz-list/{id}/{category}', [UserController::class, 'userQuizList']);
Route::get('start-quiz/{id}/{name}', [UserController::class, 'startQuiz']);
//Route::view('user-signup','user-signup');
Route::get('user-login', function () {
    if(session()->has('user')){
        return redirect('/');
    }
    return view('user-login');
});

Route::get('user-signup', function () {
    if(session()->has('user')){
        return redirect('/');
    }
    return view('user-signup');
});
Route::get('/contact', function () {
    return view('contact');
});


Route::get('categories-list',[UserController::class,'categories']);


Route::get('certificate',[UserController::class,'certificate']);

Route::get('/downlode-certificate',[UserController::class,'downloadcertificate']);




Route::post('user-signup',[UserController::class,'userSignup']);
Route::get('user-logout',[UserController::class,'userLogout']);
Route::get('user-signup-quiz',[UserController::class,'userSignupQuiz']);
Route::get('user-login-quiz',[UserController::class,'userLoginQuiz']);
Route::get('search-quiz',[UserController::class,'searchQuiz']);

Route::get('verify-user/{email}',[UserController::class,'verifyUser']);

Route::view('user-forgot-password','user-forgot-password');

Route::post('user-forgot-password',[UserController::class,'userForgotPassword']);

Route::get('user-forgot-password/{email}',[UserController::class,'userResetForgotPassword']);

Route::post('user-set-forgot-password',[UserController::class,'userSetForgotPassword']);



//Route::view('user-login','user-login');
Route::post('user-login',[UserController::class,'userLogin']);


Route::middleware('CheckUserAuth')->group(function(){
  Route::get('user-details', [UserController::class, 'userDetails']);
  Route::post('submit-next/{id}', [UserController::class, 'submitAndNext']);
  Route::get('mcq/{id}/{name}',[UserController::class,'mcq']);
  

});



Route::middleware('CheckAdminAuth')->group(function(){
Route::get('/dashboard', [AdminController::class, 'dashboard']);

Route::get('admin-category',[AdminController::class,'category']);

Route::get('admin-logout',[AdminController::class,'logout']);

Route::post('add-category',[AdminController::class,'addCategory']);

Route::get('category/delete/{id}',[AdminController::class,'deleteCategory']);

Route::post('add-quiz', [AdminController::class, 'addQuiz']);
Route::get('add-quiz', [AdminController::class, 'addQuiz']);

Route::post('add-mcq', [AdminController::class, 'addMCQs']);

Route::get('end-quiz', [AdminController::class, 'endQuiz']);

Route::get('show-quiz/{id}/{quizName}', [AdminController::class, 'showQuiz']);

Route::get('quiz-list/{id}/{category}', [AdminController::class, 'quizList']);

Route::get('/messages', [ContactController::class, 'index']);
Route::delete('/delete-message/{id}', [ContactController::class, 'destroy']);


});
Route::view('admin-login','admin-login');

Route::post('admin-login',[AdminController::class,'login']);





// user form submit
Route::post('/contact', [ContactController::class, 'store']);

// admin messages page
