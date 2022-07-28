<?php

use App\Http\Controllers\QuizController;
use App\Http\Controllers\TestController;
use App\Http\Livewire\Posts;
use Illuminate\Support\Facades\Route;

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
//
//Route::get('/', function () {
//    return view('welcome');
//});
//
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('posts', Posts::class);

Route::resource('test', TestController::class);

Route::get('wizard', function () {
    return view('welcome');
});

//Route::get('/quiz', [QuizController::class,'index'])->name('quiz-index');
//Route::get('/quiz/{id}', [QuizController::class,'show'])->name('quiz-list');

Route::resource('/quiz', QuizController::class)
    ->middleware(['auth']);

Route::get('quiz/{id}/score/{user}', [QuizController::class, 'score'])->name('score');

Route::get('score', [QuizController::class, 'scoreAll'])->name('scoreAll');

require __DIR__.'/auth.php';
