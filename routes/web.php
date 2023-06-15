<?php

use App\Http\Controllers\AbsenceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ServeillantGeneralController;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\EmploiController;
use App\Http\Controllers\SeanceController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\PaypalPaymentController;
use App\Http\Controllers\DiverController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\InscriptionController;

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

// Route::get('/paypal', function () {
//     return view('paypal');
// });

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Start Prof Controller
Route::get('/addProf',[ProfController::class,'create'])->name('createprof');
Route::put('/editprof/update/{prof}', [ProfController::class, 'update'])->name('updateprof');
Route::get('/allProf',[ProfController::class,'showall'])->name('allprof');
Route::post('/storeProf',[ProfController::class,'store'])->name('storeprof');
Route::get('/editprof/{prof}',[ProfController::class,'edit'])->name('editprof');
Route::delete('/deleteprof/{id}', [ProfController::class, 'destroy'])->name('deleteprof');
Route::get('/profileprof/{id}',[ProfController::class,'profile'])->name('profileprof');
// End Prof Controller
//Start Surveillant General controller
Route::get('/addSurveillantGeneral',[ServeillantGeneralController::class, 'create'])->name('createSG');
Route::post('/storeSurveillantGeneral',[ServeillantGeneralController::class,'store'])->name('storeSG');
Route::get('/allSurveillantGeneral',[ServeillantGeneralController::class,'showall'])->name('allSG');
Route::delete('/deleteSurveillantGeneral/{id}', [ServeillantGeneralController::class, 'destroy'])->name('deleteSG');
Route::get('/editSurveillantGeneral/{surveillant_generale}',[ServeillantGeneralController::class,'edit'])->name('editSG');
Route::put('/editSurveillantGeneral/update/{surveillant_generale}', [ServeillantGeneralController::class, 'update'])->name('updateSG');
Route::get('/profileSurveillantGeneral/{id}',[ServeillantGeneralController::class,'profile'])->name('profileSG');
//End Surveillant General controller

//start CRUD admin
Route::get('/add_admin',[AdController::class,'index'])->name('createadmin');
Route::put('/editadmin/update/{admin}', [AdController::class, 'update'])->name('updateadmin');
Route::get('/allAdmin',[AdController::class,'show'])->name('alladmin');
Route::post('/storeAdmin',[AdController::class,'store'])->name('storeadmin');
Route::get('/editadmin/{admin}',[AdController::class,'edit'])->name('editadmin');
Route::delete('/deleteadmin/{id}', [AdController::class, 'destroy'])->name('deleteadmin');
Route::get('/profileadmin/{id}',[AdController::class,'profile'])->name('profileadmin');
//end CRUD admin
//Start Filiere controller
Route::get('/allFiliere',[FiliereController::class,'showall'])->name('allfiliere');
Route::post('/storeFiliere',[FiliereController::class,'store'])->name('storefiliere');
Route::delete('/deleteFiliere/{id}', [FiliereController::class, 'destroy'])->name('deletefiliere');
Route::put('/editFiliere/update/{id}', [FiliereController::class, 'update'])->name('updatefiliere');
Route::get('/edit_filiere/{id}',[FiliereController::class,'edit']);
//End Filiere controller
//Start student controller
Route::get('/addStudent',[StudentController::class,'create'])->name('createstudent');
Route::post('/storeStudent',[StudentController::class,'store'])->name('storestudent');
Route::put('/editstudent/update/{id}', [StudentController::class, 'update'])->name('updatestudent');
Route::get('/editstudent/{id}',[StudentController::class,'edit'])->name('editstudent');
Route::get('/allStudent',[StudentController::class,'showall'])->name('allstudent');
Route::delete('/deletestudent/{id}', [StudentController::class, 'destroy'])->name('deletestudent');
Route::get('/profilestudent/{id}',[StudentController::class,'profile'])->name('profilestudent');
//End student controller
//Start family controller
Route::get('/addFamily',[FamilyController::class,'create'])->name('createfamily');
Route::post('/storeFamily',[FamilyController::class,'store'])->name('storefamily');
Route::put('/editfamily/update/{id}', [FamilyController::class, 'update'])->name('updatefamily');
Route::get('/editfamily/{id}',[FamilyController::class,'edit'])->name('editfamily');
Route::get('/allFamily',[FamilyController::class,'showall'])->name('allfamily');
Route::delete('/deletefamily/{id}', [FamilyController::class, 'destroy'])->name('deletefamily');
Route::get('/profilefamily/{id}',[FamilyController::class,'profile'])->name('profilefamily');
//End family controller
//Start document controller
Route::get('/addDocument',[DocumentController::class,'create'])->name('createdocument');
Route::post('/storeDocument',[DocumentController::class,'store'])->name('storedocument');
Route::put('/editdocument/update/{id}', [DocumentController::class, 'update'])->name('updatedocument');
Route::get('/editdocument/{id}',[DocumentController::class,'edit'])->name('editdocument');
Route::get('/allDocument',[DocumentController::class,'showall'])->name('alldocument');
Route::delete('/deletedocument/{id}', [DocumentController::class, 'destroy'])->name('deletedocument');
Route::get('/profiledocument/{id}',[DocumentController::class,'profile'])->name('profiledocument');
Route::get('/download/{id}',[DocumentController::class,'download'])->name('download');
//End domcument controller
//Start Class controller
Route::get('/allClass',[ClassController::class,'showall'])->name('allclass');
Route::post('/storeClass',[ClassController::class,'store'])->name('storeclass');
Route::delete('/deleteClass/{id}', [ClassController::class, 'destroy'])->name('deleteclass');
Route::put('/editClass/update/{id}', [ClassController::class, 'update'])->name('updateclass');
Route::get('/edit_class/{id}',[ClassController::class,'edit']);
Route::resource('classes', ClassController::class);
//End Class controller
//Start Salle controller
Route::get('/allSalles',[SalleController::class,'showall'])->name('allsalles');
Route::get('/allSalles',[SalleController::class,'showall'])->name('allsalles');
Route::post('/storeSalle',[SalleController::class,'store'])->name('storesalle');
Route::put('/editSalle/update/{id}', [SalleController::class, 'update'])->name('updatesalle');
Route::delete('/deleteSalle/{id}', [SalleController::class, 'destroy'])->name('deletesalle');
Route::get('/edit_salle/{id}',[SalleController::class,'edit']);
//End Salle controller
//start routes Niveau
Route::get('/Niveau',[NiveauController::class,'index']);
Route::get('/all_Niveau',[NiveauController::class , 'create'])->name('all_Niveau');
Route::get('/sous_niveau/{id}',[NiveauController::class ,'all_sous_niveau_by_niveau']);
Route::get('/edit_sous_niveau/{id}',[NiveauController::class,'edit_sous_niveau']);
Route::put('/update_sous_Niveau',[NiveauController::class,'update_sous_niveau']);
Route::post('/add_niveau',[NiveauController::class,'store'])->name('add_niveau');
Route::get('/edit_niveau/{id}',[NiveauController::class,'edit']);
Route::put('/update_Niveau',[NiveauController::class,'update']);
Route::delete('/delete/{id}',[NiveauController::class,'delete_sous_niveau']);
Route::delete('/delete-niveau/{id}',[NiveauController::class,'destroy']);
//end routes Niveau
//start routes matieregi
Route::get('/matiere',[MatiereController::class,'index'])->name('matiere');
Route::post('/add_matiere',[MatiereController::class,'store'])->name('add_matiere');
Route::get('/edit/{id}',[MatiereController::class,'edit']);
Route::put('/update_matiere',[MatiereController::class,'update']);
Route::delete('/delete-matiere/{id}',[MatiereController::class,'destroy']);
//end routes matiere
//start routes Emploi
Route::get('/emploi',[EmploiController::class,'index'])->name('emploi');
Route::get('/available-profs',[SeanceController::class,'availableProfs'])->name('available-profs');
Route::get('/available-classes',[SeanceController::class,'availableClasses'])->name('available-classes');
Route::get('/available-salles',[SeanceController::class,'availableSalles'])->name('available-salles');
Route::resource('seances', SeanceController::class);
//end routes Emploi
//start routes Notification
Route::resource('/posts',PostController::class);
Route::resource('/comment',CommentController::class);
//end routes Notification
//start routes paypal paiement
Route::get('/paypal',[PaypalPaymentController::class,'paypal'])->name('paypal');
Route::get('/payment',[PaypalPaymentController::class,'payment'])->name('payment');
Route::get('/cancel',[PaypalPaymentController::class,'cancel'])->name('payment.cancel');
Route::get('/payment/success',[PaypalPaymentController::class,'success'])->name('payment.success');
//end routes paypal paiement
//start routes stripe paiement
Route::get('/stripe',[StripePaymentController::class,'stripe'])->name('stripe');
Route::post('/Stripe',[StripePaymentController::class,'stripePost'])->name('stripe.post');
//end routes stripe paiement
//start routes Absence
Route::view('absence', 'absence.absence')->name('absence-view');
Route::resource('absences', AbsenceController::class);
//end routes Absence
//start routes Diver
Route::get('/Diver',[DiverController::class,'index'])->name('Divers');
Route::post('/Add_Diver',[DiverController::class,'store'])->name('add_diver');
Route::get('/editDiver/update/{id}',[DiverController::class,'edit']);
Route::put('/Edit_Diver/update/{id}', [DiverController::class, 'update']);
Route::delete('/deleteDiver/{id}', [DiverController::class, 'destroy'])->name('deletediver');
//end routes Diver
//Start inscription controller
Route::get('/allInscription',[InscriptionController::class,'showall'])->name('allinscription');
Route::post('/storeinscription',[InscriptionController::class,'store'])->name('storeinscription');
Route::put('/editInscription/update/{id}', [InscriptionController::class, 'update'])->name('updateinscription');
Route::delete('/deleteInscription/{id}', [InscriptionController::class, 'destroy'])->name('deleteinscription');
Route::get('/edit_inscription/{id}',[InscriptionController::class,'edit']);
//End inscription controller
//Start driver routes
Route::view('driver', 'driver.driver');
Route::resource('drivers', DriverController::class);
//End driver routes
//Start Event controller
Route::get('/allEvent',[EventController::class,'showall'])->name('allevent');
Route::post('/storeevent',[EventController::class,'store'])->name('storeevent');
Route::put('/editEvent/update/{id}', [EventController::class, 'update'])->name('updateevent');
Route::delete('/deleteEvent/{id}', [EventController::class, 'destroy'])->name('deleteevent');
Route::get('/edit_event/{id}',[EventController::class,'edit']);
//End event controller
});
