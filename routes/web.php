<?php

use App\Http\Controllers\ProfileController;
use Database\Factories\CategoryFactory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\PlayNowController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewCategoryController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\HSController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
//promeninti dashboadr u nesto
//Route::get('/dashboard', [QuestionsController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
    Route::get('/dashboard', [QuestionsController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
    
    Route::post('/categories', [NewCategoryController::class, 'store'])->name('categories.store');
    Route::resource('/categories', NewCategoryController::class);
    Route::resource('/editCategory', NewCategoryController::class);

    Route::post('/questions', [QuestionsController::class, 'store'])->name('questions.store');
    Route::resource('/questions', QuestionsController::class);
    
    Route::resource('/editQuestion', QuestionsController::class);
    Route::get('/editQuestion', [QuestionsController::class, 'index'])->name('editQuestion');
    Route::get('/', [QuestionsController::class, 'index'])->name('questions.index');
    
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');   
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/playnow', PlayNowController::class);
    Route::get('/playnow', [PlayNowController::class, 'index'])->name('playnow.index');

    Route::resource('/highscores', HSController::class);
    Route::get('/highscores', [HSController::class, 'index'])->name('highscores.index');
   

    
});

require __DIR__.'/auth.php';
