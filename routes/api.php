<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\Domain_StatusController;
use App\Http\Controllers\NameserverController;
use App\Http\Controllers\Domain_NameserverController;

// DOMAINS //

Route::get('domains', [DomainController::class, 'index']);
Route::get('domain/{id}', [DomainController::class, 'show']);
Route::post('domain', [DomainController::class, 'store']);
Route::put('domain/{id}', [DomainController::class, 'update']);
Route::delete('domain/{id}', [DomainController::class,'destroy']);

// STATUSES //

Route::get('statuses', [StatusController::class, 'index']);
Route::get('status/{id}', [StatusController::class, 'show']);
Route::post('status', [StatusController::class, 'store']);
Route::put('status/{id}', [StatusController::class, 'update']);
Route::delete('status/{id}', [StatusController::class,'destroy']);

// DOMAIN X STATUS //

Route::get('domain_statuses', [Domain_StatusController::class, 'index']);
Route::get('domain_status/{id}', [Domain_StatusController::class, 'show']);
Route::post('domain_status', [Domain_StatusController::class, 'store']);
Route::put('domain_status/{id}', [Domain_StatusController::class, 'update']);
Route::delete('domain_status/{id}', [Domain_StatusController::class,'destroy']);

// NAMESERVERS //

Route::get('nameservers', [NameserverController::class, 'index']);
Route::get('nameserver/{id}', [NameserverController::class, 'show']);
Route::post('nameserver', [NameserverController::class, 'store']);
Route::put('nameserver/{id}', [NameserverController::class, 'update']);
Route::delete('nameserver/{id}', [NameserverController::class,'destroy']);

// DOMAIN X NAMESERVER //

Route::get('domain_nameservers', [Domain_NameserverController::class, 'index']);
Route::get('domain_nameserver/{id}', [Domain_NameserverController::class, 'show']);
Route::post('domain_nameserver', [Domain_NameserverController::class, 'store']);
Route::put('domain_nameserver/{id}', [Domain_NameserverController::class, 'update']);
Route::delete('domain_nameserver/{id}', [Domain_NameserverController::class,'destroy']);