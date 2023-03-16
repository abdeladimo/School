<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ServeillantGeneralController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\StudentController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Start Prof Controller
Route::get('/addProf',[ProfController::class,'create'])->name('createprof');
Route::put('/editprof/update/{id}', [ProfController::class, 'update'])->name('updateprof');
Route::get('/allProf',[ProfController::class,'showall'])->name('allprof');
Route::post('/storeProf',[ProfController::class,'store'])->name('storeprof');
Route::get('/editprof/{id}',[ProfController::class,'edit'])->name('editprof');
Route::delete('/deleteprof/{id}', [ProfController::class, 'destroy'])->name('deleteprof');
Route::get('/profileprof/{id}',[ProfController::class,'profile'])->name('profileprof');
// End Prof Controller
//Start departement controller
Route::get('/departement',[DepartmentController::class,'index']);
Route::get('/alldepartement',[DepartmentController::class,'create'])->name('alldepartement');
Route::post('/add_departement',[DepartmentController::class,'store'])->name('add_departement');
Route::get('/edit_departement/{id}',[DepartmentController::class,'edit']);
Route::put('/update_departement',[DepartmentController::class,'update']);
Route::delete('/delete_departement',[DepartmentController::class,'destroy']);
//End departement controller
//Start Surveillant General controller
Route::get('/addSurveillantGeneral',[ServeillantGeneralController::class, 'create'])->name('createSG');
Route::post('/storeSurveillantGeneral',[ServeillantGeneralController::class,'store'])->name('storeSG');
Route::get('/allSurveillantGeneral',[ServeillantGeneralController::class,'showall'])->name('allSG');
Route::delete('/deleteSurveillantGeneral/{id}', [ServeillantGeneralController::class, 'destroy'])->name('deleteSG');
Route::get('/editSurveillantGeneral/{id}',[ServeillantGeneralController::class,'edit'])->name('editSG');
Route::put('/editSurveillantGeneral/update/{id}', [ServeillantGeneralController::class, 'update'])->name('updateSG');
Route::get('/profileSurveillantGeneral/{id}',[ServeillantGeneralController::class,'profile'])->name('profileSG');
//End Surveillant General controller

//start CRUD admin
Route::get('/add_admin',[AdController::class,'index'])->name('createadmin');
Route::put('/editadmin/update/{id}', [AdController::class, 'update'])->name('updateadmin');
Route::get('/allAdmin',[AdController::class,'show'])->name('alladmin');
Route::post('/storeAdmin',[AdController::class,'store'])->name('storeadmin');
Route::get('/editadmin/{id}',[AdController::class,'edit'])->name('editadmin');
Route::delete('/deleteadmin/{id}', [AdController::class, 'destroy'])->name('deleteadmin');
Route::get('/profileadmin/{id}',[AdController::class,'profile'])->name('profileadmin');
//end CRUD admin
//Start student controller
Route::get('/addStudent',[StudentController::class,'create'])->name('createstudent');
Route::post('/storeStudent',[StudentController::class,'store'])->name('storestudent');
Route::put('/editstudent/update/{id}', [StudentController::class, 'update'])->name('updatestudent');
Route::get('/editstudent/{id}',[StudentController::class,'edit'])->name('editstudent');
Route::get('/allStudent',[StudentController::class,'showall'])->name('allstudent');
Route::delete('/deletestudent/{id}', [StudentController::class, 'destroy'])->name('deletestudent');
Route::get('/profilestudent/{id}',[StudentController::class,'profile'])->name('profilestudent');
//End student controller

