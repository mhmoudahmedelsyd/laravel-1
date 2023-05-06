<?php

use App\Http\Controllers\SubjectController;
use App\Models\Department;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('departments', function () {
   $department= Department::get();
    return view('departments',['departments'=>$department]);
});



 Route::resource('/subjects',SubjectController::class);
 Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
