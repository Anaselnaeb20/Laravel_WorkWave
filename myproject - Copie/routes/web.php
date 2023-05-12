<?php

use App\Http\Controllers\OffreController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController;
use App\Models\Candidate;

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
    return view('index');
});
Route::resource('/offre',OffreController::class) ;

Route::resource('/candidate',CandidateController::class) ;
// Route::get('/candidate/create/{offer_id}', [Candidate::class, 'create'])->name('apply');
Route::get('/candidate/create/{offre_id}', [CandidateController::class, 'create'])->name('candidate.create');
Route::get('/offre/{offre}/candidates', [OffreController::class, 'showCandidates'])->name('offre.show-candidates');// to display all the caniddates of an offre
// Route::get('/candidate/{id}', [CandidateController::class, 'showMycandidates'])->name('candidate.show-Mycandidates');//to acces to my candidates as a user 
Route::get('/my-candidates/{id}', 'App\Http\Controllers\CandidateController@showMycandidates')->name('candidate.show-Mycandidates')->middleware('auth') ;
Route::put('/my-candidates/{id}', 'App\Http\Controllers\CandidateController@update') ;

Route::get('/view-file/{id}/{file}', 'App\Http\Controllers\CandidateController@viewFile')->name('view-file');

// to edit a candidat
Route::get('/candidate/{candidate_id}/offer/{offer_id}/edit', [CandidateController::class, 'edit'])->name('candidate.edit');
//delete a candidate
Route::delete('/my-candidates/{id}', [CandidateController::class, 'destroy']);

//to show just the offers created by one HR
Route::get('/offres/{id}', [OffreController::class, 'showOffres'])->name('offre.show-offres');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
