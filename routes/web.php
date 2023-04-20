<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EtudiantController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\ProfController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\espaceController;
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
    Route::get('/dashboard/EspaceCours', [HomeController::class, 'EspaceCours'])->name('etud.EspaceCours');
    Route::get('etudiant/profile/{id_user}',[EtudiantController::class,'getProfile'])->name('etudiantProfile');
    Route::post('etudiant/profile/modifier/{id_user}',[EtudiantController::class,'modifierProfile'])->name('modifierProfile');
});

// Manager Routes

Route::middleware(['auth','user-access:prof'])->group(function () {

    Route::get('/prof/dashboard', [HomeController::class, 'etudDashboard'])->name('prof.dashboard');
    Route::post('/prof/dashboard/get-modules', [HomeController::class, 'getModules'])->name('get.modules');
    Route::post('/prof/dashboard/annonce_store', [HomeController::class, 'store'])->name('annonce.store');
    Route::get('/prof/dashboard/EspaceCours/{id_module}', [HomeController::class, 'EspaceCours'])->name('prof.EspaceCours');
    Route::get('prof/profile/{id_user}',[ProfController::class,'getProfile'])->name('profProfile');
    Route::post('/prof/dashboard/EspaceCours/section_store/{id_module}', [espaceController::class, 'store'])->name('section.store');
    Route::post('prof/profile/modifier/{id_user}',[ProfController::class,'modifierProfile'])->name('profModifierProfile');
});

// Super Admin Routes

Route::middleware(['auth','user-access:admin'])->group(function () {

    Route::get('/admin/dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/ajouter',[FiliereController::class,'dropDownShow'])->name('ajoutEtud');
    Route::post('/admin/ajoutetud',[EtudiantController::class,'add'])->name('ajouterEtudiant');
    Route::get('admin/afficheEtud',[EtudiantController::class,'index'])->name('afficheEtud');
    Route::get('admin/afficheProf',[ProfController::class,'index'])->name('afficheProf');
    Route::get('admin/afficheModule',[ModuleController::class,'index'])->name('afficheModule');
    Route::get('/editEtudiant/{id_user}',[EtudiantController::class,'edit'])->name('editerEtudiant');
    Route::post('/updatEtud/{id_user}',[EtudiantController::class,'update'])->name('updateEtud');
    Route::get('/consulter',[EtudiantController::class,'consulter'])->name('consulterEtud');
    Route::get('/admin/ajouterProfesseurForm',[ProfController::class,'ajoutView'])->name('ajouterProfView');
    Route::get('/admin/ajouterModuleForm',[ModuleController::class,'ajouterView'])->name('ajouterModuleView');
    Route::get('/admin/Dashboard',function(){
        return view('admineHome');
    })->name('admineHome');
    Route::post('/admin/ajoutetud/get-modules', [ModuleController::class, 'getModules'])->name('modules.get');
    Route::post('/admin/ajoutProfesseur',[ProfController::class,'add'])->name('ajouterProf');
    Route::post('/admin/ajoutModule',[ModuleController::class,'add'])->name('ajouterModule');
    Route::get('/editProf/{id_user}',[ProfController::class,'edit'])->name('editerProf');
    Route::post('/updateProf/{id_user}',[ProfController::class,'update'])->name('updateProf');
    Route::get('/supprimerProf/{id_user}',[ProfController::class,'delete'])->name('deleteProf');
    Route::get('/editModule/{id_module}',[ModuleController::class,'edit'])->name('editerModule');
    Route::post('/updateModule/{id_module}',[ModuleController::class,'update'])->name('updateModule');
    Route::get('/supprimerModule/{id_module}',[ModuleController::class,'delete'])->name('deleteModule');
    Route::get('/supprimerEtudiant/{id_user}',[EtudiantController::class,'delete'])->name('deleteEtudiant');
    Route::get('admin/profile/{id_user}',[AdminController::class,'getProfile'])->name('adminProfile');
    Route::post('admin/profile/modifier/{id_user}',[AdminController::class,'updateProfile'])->name('adminUpdateProfile');
    

    /*Route::get('/admin/ajouterProfForm',function(){
        return view('AjouterProfesseur');
    })->name('ajouterProfView');
    Route::get('/admin/ajouterModuleForm',function(){
        return view('AjouterModule');
    })->name('ajouterModuleView');*/
});

