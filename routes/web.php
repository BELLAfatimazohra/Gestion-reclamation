<?php

use App\Http\Controllers\ClientAuthController;
use App\Http\Controllers\ClientRegisterController;
use App\Http\Controllers\PersonnelAuthController;
use App\Http\Controllers\ClientHomeController;
use App\Http\Controllers\ClientReclamationController;
use App\Http\Controllers\PersonnelHomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;

// Page principale de login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Routes pour l'authentification des clients
Route::get('/client/login', function () {
    return view('auth.login'); // Utilisez une seule vue pour les deux types d'utilisateurs
})->name('client.login');

Route::post('/client/login', [ClientAuthController::class, 'login'])->name('client.login.submit');
Route::get('/client/home', [ClientAuthController::class, 'home'])->name('client.home')->middleware('auth:client');

// Routes pour l'authentification du personnel
Route::get('/personnel/login', function () {
    return view('auth.login'); // Utilisez une seule vue pour les deux types d'utilisateurs
})->name('personnel.login');

Route::post('/personnel/login', [PersonnelAuthController::class, 'login'])->name('personnel.login.submit');
Route::get('/personnel/home', [PersonnelAuthController::class, 'home'])->name('personnel.home')->middleware('auth:personnel');

// Route pour l'inscription des clients
Route::get('/client/register', [ClientRegisterController::class, 'showRegistrationForm'])->name('client.register');
Route::post('/client/register', [ClientRegisterController::class, 'register'])->name('client.register.submit');
// Routes pour les pages d'accueil
Route::get('/client/home', [ClientHomeController::class, 'index'])->name('client.home');
Route::get('/personnel/home', [PersonnelHomeController::class, 'index'])->name('personnel.home');
// Routes pour le client
Route::get('/client/reclamations', [ClientReclamationController::class, 'index'])->name('client.reclamations');
Route::get('/client/reclamation/create', [ClientReclamationController::class, 'create'])->name('client.reclamation.create');
Route::post('/client/logout', [ClientAuthController::class, 'logout'])->name('client.logout');
Route::post('/client/read', [ClientAuthController::class, 'read'])->name('client.read');