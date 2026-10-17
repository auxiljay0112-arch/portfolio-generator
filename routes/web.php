<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PublicPortfolioController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\WorkspaceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Auth::check() ? redirect('/dashboard') : redirect('/login');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:10,1');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [WorkspaceController::class, 'dashboard'])->name('dashboard');

    Route::get('/profile', [WorkspaceController::class, 'profile']);
    Route::post('/profile', [WorkspaceController::class, 'updateProfile']);

    Route::get('/projects', [ProjectController::class, 'index']);
    Route::post('/projects', [ProjectController::class, 'store']);
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy']);

    Route::get('/skills', [SkillController::class, 'index']);
    Route::post('/skills', [SkillController::class, 'store']);
    Route::delete('/skills/{id}', [SkillController::class, 'destroy']);

    Route::get('/education', [EducationController::class, 'index']);
    Route::post('/education', [EducationController::class, 'store']);
    Route::delete('/education/{id}', [EducationController::class, 'destroy']);

    Route::get('/templates', [WorkspaceController::class, 'templates']);
    Route::post('/templates', [WorkspaceController::class, 'chooseTemplate']);

    Route::get('/preview', [WorkspaceController::class, 'preview']);
    Route::get('/preview/frame', [WorkspaceController::class, 'previewFrame']);

    Route::get('/publish', [WorkspaceController::class, 'publish']);
    Route::post('/publish', [WorkspaceController::class, 'togglePublish']);
    Route::post('/publish/slug', [WorkspaceController::class, 'updateSlug']);
    Route::get('/export', [WorkspaceController::class, 'export']);
});

Route::get('/p/{slug}', [PublicPortfolioController::class, 'show']);