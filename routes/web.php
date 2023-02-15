<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/frontend/login', function () {
    return view('frontend.login');
});
Route::get('frontend/register', function () {
    return view('frontend.register');
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

Route::resource('admin/users', 'App\\Http\\Controllers\\Admin\UsersController');
Route::resource('admin/quiz-template', 'App\\Http\\Controllers\\Admin\QuizTemplateController');
Route::resource('admin/quizzes', 'App\\Http\\Controllers\\Admin\QuizzesController');
Route::resource('admin/quiz-answer', 'App\\Http\\Controllers\\Admin\QuizAnswerController');
Route::resource('admin/quizzes', 'App\\Http\\Controllers\\Admin\QuizzesController');
Route::resource('admin/quizzes', 'App\\Http\\Controllers\\Admin\QuizzesController');
Route::resource('admin/quiz-answer', 'App\\Http\\Controllers\\Admin\QuizAnswerController');
Route::resource('admin/candidates', 'App\\Http\\Controllers\\Admin\CandidatesController');
Route::resource('admin/candidates', 'App\\Http\\Controllers\\Admin\CandidatesController');