<?php

use App\Http\Controllers\EtudiantController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\ProfController;
use App\Http\Controllers\ModuleController;
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

Auth::routes([
    'register'=>false
]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Users Routes

Route::middleware(['auth','user-access:user'])->group(function () {

    Route::get('/dashboard', [HomeController::class, 'etudDashboard'])->name('dashboard');

});

// Manager Routes

Route::middleware(['auth','user-access:prof'])->group(function () {

    Route::get('/prof/dashboard', [HomeController::class, 'profDashboard'])->name('prof.dashboard');
});

// Super Admin Routes

Route::middleware(['auth','user-access:admin'])->group(function () {

    Route::get('/admin/dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/ajouter',[FiliereController::class,'dropDownShow'])->name('ajoutEtud');
    Route::post('/admin/ajoutetud',[EtudiantController::class,'add'])->name('ajouterEtudiant');
    Route::get('admin/afficheEtud',[EtudiantController::class,'retriev'])->name('afficheEtud');
    Route::get('/edit/{id}',[EtudiantController::class,'edit'])->name('editEtud');
    Route::post('/{id}',[EtudiantController::class,'update'])->name('updateEtud');
    Route::get('/consulter',[EtudiantController::class,'consulter'])->name('consulterEtud');
    Route::get('/admin/ajouterProfesseurForm',[ProfController::class,'ajoutView'])->name('ajouterProfView');
    Route::get('/admin/ajouterModuleForm',[ModuleController::class,'ajouterView'])->name('ajouterModuleView');
    /*Route::get('/admin/ajouterProfForm',function(){
        return view('AjouterProfesseur');
    })->name('ajouterProfView');
    Route::get('/admin/ajouterModuleForm',function(){
        return view('AjouterModule');
    })->name('ajouterModuleView');*/
});

