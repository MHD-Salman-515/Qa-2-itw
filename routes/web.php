<?php



use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [QuestionController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
    Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');

    Route::post('/questions/{question}/answers', [AnswerController::class, 'store'])->name('answers.store');

    Route::post('/votes', [VoteController::class, 'store'])->name('votes.store');
});

Route::get('/questions/{question}', [QuestionController::class, 'show'])->name('questions.show');

// Auth routes (login, register)
Auth::routes();

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
