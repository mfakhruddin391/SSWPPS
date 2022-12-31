<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TechController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\IotnetController;
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
Route::get('logout',[DashboardController::class,'logout'])->name('logout');

Route::get('/dashboard',[DashboardController::class,'index']);

Route::get('/techResetPassword/{id}',[TechController::class,'resetPassword']);

//technician
Route::get('/', function () { return view('technician/login/loginTechnician'); });
Route::post('techLoginAuth',[TechController::class,'loginAuthentication']);

Route::middleware(['authTech'])->group(function(){

    Route::get('/distributedTask',[TaskController::class,'distributedTask']);
    Route::post('/completeTask',[TaskController::class,'completeTask']);
    Route::get('/editPassword',[TechController::class,'editPassword']);
    Route::post('/updatePassword',[TechController::class,'updatePassword']);
});


//!--technician

//admin
Route::get('/admin', function () {return view('admin/login/loginAdmin');});
Route::post('adminLoginAuth',[AdminController::class,'loginAuthentication']);


Route::middleware(['authAdmin'])->group(function(){
    //Task
    Route::get('/createTask',[TaskController::class,'create']);
    Route::post('/storeTask',[TaskController::class,'store']);
    Route::get('/manageTask',[TaskController::class,'manageTask']);
    Route::post('/assignTask',[TaskController::class,'assignTask']);
    Route::get('deleteTask/{id}',[TaskController::class,'delete']);


    //Technician
    Route::get('/createTech',[TechController::class,'create']);
    Route::post('storeTech',[TechController::class,'store']);
    Route::post('updateTech',[TechController::class,'update'])->name('updateTech');
    Route::get('deleteTech/{id}',[TechController::class,'delete']);

    Route::get('/manageTech',[TechController::class,'manageTech']);
    Route::get('/manageTech/editTech/{id}',[TechController::class,'edit']);
   
    //SSWPPS IoT Net
    Route::get('/createIotNet',[IotnetController::class,'create']);
    Route::post('storeIotNet',[IotnetController::class,'store']);
    Route::get('/manageIotNet',[IotnetController::class,'manageIotNet']);
    Route::get('/manageIotNet/editIotNet/{id}',[IotnetController::class,'edit']);
    Route::post('updateIotNet',[IotnetController::class,'update'])->name('updateIotNet');
    Route::get('deleteIotNet/{id}',[IotnetController::class,'delete']);
    Route::get('/liveStatus',[IotnetController::class,'liveStatus']);
    Route::get('/liveStatusAJAXRequest',[IotnetController::class,'liveStatusAJAXRequest']);

   
});
