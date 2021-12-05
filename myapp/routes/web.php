<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\QrCodeGeneratorController;
use App\Http\Controllers\PDFController;

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
    return view('home');
});


Route::get('/deposer', function () {
    return view('form');
});  
Route::get('/instructions', function () {
    return view('instructions');

});


Route::get('/users.create', function () {
    return view('users.create');

})->name('users.create');



Route::get('/commissions.edit', function () {
    return view('commissions.edit');

})->name('commissions.edit');


Route::get('/users.edit', function () {
    return view('users.edit');

})->name('users.edit');

/*Route::middleware(['auth:sanctum', 'verified'])->get('/form', function () {
    return view('form');
})->name('form');*/




Route::group(['middleware' => ['auth']], function() {
    Route::get('/deposer', function () {
        return view('form');
    });   
    Route::get('/suivi',  [DemandeController::class, 'suivi']); 
    Route::get('/suivi/{user_id}',  [DemandeController::class, 'suivi']);
});

Route::get('/suivi/{user_id}',  [DemandeController::class, 'suivi']);
Route::post('/form', [DemandeController::class, 'storeForm']);
Route::get('/form', [DemandeController::class, 'createForm']);
Route::get('/list/{etape}', [DemandeController::class, 'index']);
Route::get('/details/{id}/{etape}', [DemandeController::class, 'showDetails']);

Route::post('/editForm/{id}', [DemandeController::class, 'update']);
Route::get('/editForm/{id}', [DemandeController::class, 'edit']);
Route::get('/affectCommission/{id}', [DemandeController::class, 'choisir'])->middleware('role:Admin');
Route::post('/affecter/{id}', [DemandeController::class, 'affecter'])->name('affecter')->middleware('role:Admin');

Route::get('/valider/{id}',  [DemandeController::class, 'validerEtape']);
Route::get('/rejeter/{id}',  [DemandeController::class, 'rejeterEtape']);
Route::get('/edit/{id}',  [DemandeController::class, 'edit']);
Route::get('/show',  [DemandeController::class, 'show']);
Route::get('/depot_rapport/{id}',  [DemandeController::class, 'deprap']);




Route::resource('/users', UserController::class);
Route::resource('/roles', RoleController::class);


Route::get('/commissions', [CommissionController::class,'index'])->name('commissions.index')->middleware('role:Admin');
Route::get('/commissions/create', [CommissionController::class,'create'])->name('commissions.create')->middleware('role:Admin');
Route::post('/commissions/store', [CommissionController::class,'store'])->name('commissions.store')->middleware('role:Admin');
Route::get('/commissions/show/{id}', [CommissionController::class,'show'])->name('commissions.show')->middleware('role:Admin');
Route::get('/commissions/destroy/{id}', [CommissionController::class,'destroy'] )->name('commissions.destroy')->middleware('role:Admin');
Route::post('/commissions/update/{id}', [CommissionController::class,'update'])->name('commissions.update')->middleware('role:Admin');
Route::get('/commissions/edit/{id}',[CommissionController::class,'edit'])->name('commissions.edit')->middleware('role:Admin');

Route::get('/qrcode/{id}', [QrCodeGeneratorController::class, 'generateQrCode']);
Route::get('/generate-pdf/{id}', [PDFController::class, 'generatePDF']);
