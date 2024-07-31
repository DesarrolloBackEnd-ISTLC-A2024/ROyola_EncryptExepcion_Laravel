<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EncryptionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/encrypt', [EncryptionController::class, 'showForm']);
Route::post('/encrypt', [EncryptionController::class, 'encrypt']);
