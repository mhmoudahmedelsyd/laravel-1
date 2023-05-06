<?php

use App\Models\Subject;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Redirect;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('/test',TestController::class);
Route::get('/subject',function(){
    $subject=Subject::get();
    return response()->json($subject);
});
Route::get('/subject/{id}',function($id){
    $subject=Subject::where('id','=',$id)->with('Department')->first();
    return response()->json($subject);
});
Route::post('/subject',function(Request $request,Subject $subject){
    $formFiled=$request->validate([
        'name'=>'required',
        'code'=>'required',
        'department_id'=>'required',
      ]);
           $subject->Create($formFiled);

            return response()->json(['message'=>'created successfully']);


});

