<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\GrammarController;
use App\Http\Controllers\VocabularyController;
use App\Http\Controllers\UserProgressController;
use App\Http\Controllers\JapaneseCharacterController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);

    Route::get('/characters', [JapaneseCharacterController::class, 'index']);
    Route::get('/characters/{id}', [JapaneseCharacterController::class, 'show']);
    Route::get('/characters/type/{type}', [JapaneseCharacterController::class, 'getByType']);

    Route::get('/vocabularies', [VocabularyController::class, 'index']);
    Route::get('vocabularies/{id}', [VocabularyController::class, 'show']);
    Route::get('/vocabularies/level/{level}', [VocabularyController::class, 'getByLevel']);

    Route::get('/grammar-rules', [GrammarController::class, 'index']);
    Route::get('/grammar-rules/{id}', [GrammarController::class, 'show']);
    Route::get('/grammar-rules/level/{level}', [GrammarController::class, 'getByLevel']);

    Route::get('/quizzes', [QuizController::class, 'index']);
    Route::get('/quizzes/{id}', [QuizController::class, 'show']);
    Route::post('/quizzes/{id}/attempt', [QuizController::class, 'submitAttempt']);
    Route::get('/quiz-attempts/user', [QuizController::class, 'getUserAttempts']);
    Route::get('/progress', [UserProgressController::class, 'index']);
    Route::post('/progress', [UserProgressController::class, 'updateProgress']);
    Route::get('/stats', [UserProgressController::class, 'getStats']);
    Route::get('/review-items', [UserProgressController::class, 'getReviewItems']);
    Route::post('/review-progress', [UserProgressController::class, 'updateAfterReview']);

    Route::middleware('admin')->group(function () {
        Route::post('/admin/quizzes', [QuizController::class, 'store']);
        Route::post('/admin/questions', [QuizController::class, 'storeQuestion']);
        Route::get('/admin/quizzes', [QuizController::class, 'getAllForAdmin']);
        Route::delete('/admin/quizzes/{id}', [QuizController::class, 'destroy']);
    });
});
