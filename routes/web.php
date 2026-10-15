<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

Route::redirect('/', '/create');

Route::get('/create', [PortfolioController::class, 'create']);
Route::post('/portfolios', [PortfolioController::class, 'store']);
Route::get('/p/{slug}', [PortfolioController::class, 'show']);