<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoteC;
use App\Http\Controllers\FiliereC;
use App\Http\Controllers\EtudiantC;
use App\Http\Controllers\CandidatC;
use App\Http\Controllers\DepartementC;
use App\Http\Controllers\UserC;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\UserController;
Route::get('/', function () {
    return view('welcome');
});

// Route pour le tableau de bord
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Routes authentifiées
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Routes pour les administrateurs
  //  Route::middleware(['role:admin'])->group(function () {
        Route::resource('Departement', DepartementC::class); 
        Route::resource('Filiere', FiliereC::class); 
        Route::resource('Vote', VoteC::class); 
        Route::resource('Etudiant', EtudiantC::class); 
        Route::resource('Candidat', CandidatC::class); 
       
        
        Route::get('/statistics', [VoteC::class, 'statistics'])->name('Vote.statistics'); 
   // });

    // Routes pour les étudiants
    Route::middleware(['role:etudiant'])->group(function () {
        Route::resource('Etudiant', EtudiantC::class)->only(['index', 'show']); // Limiter l'accès
        Route::resource('Candidat', CandidatC::class)->only(['index', 'show']);

        Route::resource('Vote', VoteC::class)->only(['index', 'store','create']);
        Route::resource('Departement', DepartementC::class)->only(['index', 'show']);
        Route::resource('Filiere', FiliereC::class)->only(['index', 'show']);
        Route::get('/notify-students', [UpdateController::class, 'notifyStudents']);

        Route::get('/updates/create', [UpdateController::class, 'create'])->name('updates.create');
        Route::post('/updates', [UpdateController::class, 'store'])->name('updates.store');
        Route::get('/updates', [UpdateController::class, 'index'])->name('updates.index');
                
        //Route::resource('User', UserC::class); 
    });
});

// Route pour les statistiques
Route::get('/updates/create', [UpdateController::class, 'create'])->name('updates.create');
Route::post('/updates', [UpdateController::class, 'store'])->name('updates.store');
Route::get('/updates', [UpdateController::class, 'index'])->name('updates.index');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users/{user}/role', [UserController::class, 'updateRole'])->name('users.updateRole');
Route::resource('Departement', DepartementC::class); 
Route::resource('Filiere', FiliereC::class); 
Route::resource('Vote', VoteC::class); 
Route::resource('Etudiant', EtudiantC::class); 
Route::resource('Candidat', CandidatC::class); 
       

Route::get('/statistics', [VoteC::class, 'statistics'])->name('Vote.statistics'); 
Route::get('/votes/export/csv', [VoteC::class, 'exportCsv'])->name('votes.export.csv');
Route::get('/votes/export/pdf', [VoteC::class, 'exportPdf'])->name('votes.export.pdf');
// Authentification
require __DIR__.'/auth.php';