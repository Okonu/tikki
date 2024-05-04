<?php

use App\Http\Controllers\API\CertificateAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/certificate/{certificateNumber}', [CertificateAPIController::class, 'checkCertificate']);