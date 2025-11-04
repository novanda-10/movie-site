<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::get('/movies' , [MovieController::class,'index']);


//Route::resource('movies',MovieController::class);you can do all CRUD with this


Route::get('/movies/{movie}', [MovieController::class , 'show']);


// Route::get('/postmovie' , [MovieController::class, 'create'])->middleware(['auth' ,'admin']);


 Route::middleware('can:admin')->group(function () {
    Route::get('/postmovie' , [MovieController::class, 'create']);
    Route::post('/postmovie' , [MovieController::class, 'store']);
    Route::get('/movies/{movie}/editmovie' , [MovieController::class, 'edit']);
    Route::post('/movies/{movie}/editmovie' , [MovieController::class, 'update']);
    Route::delete('/movies/{movie}/deletemovie' , [MovieController::class, 'destroy']);


    Route::get('/postmovie/baseapiform' , [MovieController::class, 'baseApiForm']);

    Route::post('/postmovie/baseapiform' , [MovieController::class, 'fetchApi']);

    Route::post('/postmovie/createmoviefromapi' , [MovieController::class, 'createMovieFromApi']);

 });




Route::get('/movies/{movie}/download' , [MovieController::class, 'download']);

Route::get('/search' , [SearchController::class, 'search']);


Route::get('/genres' , [GenreController::class, 'index']);

Route::get('/genres/{genre}' , [GenreController::class, 'show']);


Route::get('/artists' , [ArtistController::class, 'index']);



Route::get('/artists/{artist}' , [ArtistController::class, 'show']);







// Route::get('/test' , function (){

//     Mail::to('zzz@zz.com')->send(new WelcomeMail);

//     return 'dooone';
// });




