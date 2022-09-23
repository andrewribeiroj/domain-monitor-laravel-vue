<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DomainController;

// List domains
Route::get('domains', [DomainController::class, 'index']);

// List single domain
Route::get('domain/{id}', [DomainController::class, 'show']);

// Create new domain
Route::post('domain', [DomainController::class, 'store']);

// Update domain
Route::put('domain/{id}', [DomainController::class, 'update']);

// Delete domain
Route::delete('domain/{id}', [DomainController::class,'destroy']);