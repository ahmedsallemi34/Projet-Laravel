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

Route::get('/', fn() => view('home'))->name('home');
Route::get('/apropos', fn() => view('about'))->name('about');
Route::get('/historique', fn() => view('history'))->name('history');
Route::get('/contact', fn() => view('contact'))->name('contact');

Route::get('/contact', function () {
    return view('contact');
});

// Route pour gérer la soumission du formulaire de contact
Route::post('/submit-contact', function (Request $request) {
    // Ici vous pouvez gérer la logique de traitement du formulaire, comme l'enregistrement dans la base de données ou l'envoi par email
    $name = $request->input('name');
    $email = $request->input('email');
    $message = $request->input('message');

    // Exemple : Affichage des données reçues
    return "Nom: $name, Email: $email, Message: $message";
});
Route::get('/contact', function () {
    return view('contact');
})->name('contact');