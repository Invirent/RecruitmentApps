<?php
session_start();

use App\Http\Controllers\Admin\CandidatesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Candidate;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', function () {
    return view('frontend.login');
});

Route::get('/login/verify', function(){
    $email = $_GET['email'];
    $password = $_GET['password'];
    $user = User::where("email", $email)->first();
    if($user){
        if($user->password == $password){
            $_SESSION['user'] = $user;
            return redirect("/admin/users");
        }
        else{
            $_SESSION["error"] = ["message" => "Password does not match"];
            return redirect("/login");
        }
    }
    else{
        $_SESSION["error"] = ["message" => "User does not exist"];
        return redirect("/login");
    }
});

Route::get('/register', function () {
    return view('frontend.register');
});
Route::get("/register/create", function(){
    $name = $_GET['user_name'];
    $email = $_GET['email'];
    $password = $_GET['password'];
    $password_confirmation = $_GET['password_confirmation'];

    if($password != $password_confirmation){
        $_SESSION["error"] = ["message" => "Password does not match"];
        return redirect("/register");
    }
    else{
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->save();
        return redirect("/login");
    }
});

Route::get('/', function () {
    return view('layouts.main');
});
Route::get('/', function () {
    return view('layouts.main2');
});

Route::get('/admin/users', function () {
    return view('admin.users');
});

Route::get('/submitted', function () {
    return view('frontend.submitted');
});

Route::resource('admin/users', 'App\\Http\\Controllers\\Admin\UsersController');
Route::resource('admin/quiz-template', 'App\\Http\\Controllers\\Admin\QuizTemplateController');
Route::resource('admin/quizzes', 'App\\Http\\Controllers\\Admin\QuizzesController');
Route::resource('admin/quiz-answer', 'App\\Http\\Controllers\\Admin\QuizAnswerController');
Route::resource('admin/candidates', 'App\\Http\\Controllers\\Admin\CandidatesController');
Route::resource('admin/jobs', 'App\\Http\\Controllers\\Admin\JobsController');
Route::resource('admin/candidates-answers', 'App\\Http\\Controllers\\Admin\CandidatesAnswersController');

Route::get("/candidate", function(){
    if(isset($_GET["access_key"])){
        $access_key = $_GET["access_key"];
        $data = Candidate::get()->where("access_key", $access_key)->first();
        if($data){
            return view("frontend.candidate-form", compact("data"));
        }
        else{
            return redirect("/login");
        }
    }
    else{
        return redirect("/login");
    };
});

Route::post("/candidate/store", function(Request $request){
    return CandidatesController::storeAnswer($request);
}) ;

Route::resource('admin/company', 'App\\Http\\Controllers\\Admin\CompanyController');