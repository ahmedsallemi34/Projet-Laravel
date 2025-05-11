<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlansController;
use App\Http\Controllers\GestionnaireController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\RecetteController;
use App\Http\Controllers\UserController;
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
 // Routes RESTful pour chaque modèle
    Route::resource('plans', PlansController::class);
    //Route::resource('gestionnaires', GestionnaireController::class);
    //Route::get('/dashboard', [GestionnaireController::class, 'dashboard']);
    Route::get('/gestionnaire', [GestionnaireController::class, 'dashboard'])->name('gestionnaire.dashboard');
    Route::resource('ingredients', IngredientController::class);
    Route::resource('recettes', RecetteController::class);
    Route::resource('users', UserController::class);

Route::get('login', [UserController::class, 'showLoginForm'])->name('login');

// Route pour traiter la connexion
Route::post('login', [UserController::class, 'login'])->name('users.login');
//Route::post('login', [UserController::class, 'login'])->name('gestionnaire.dashboard');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/register', [UserController::class, 'store'])->name('register.store');

