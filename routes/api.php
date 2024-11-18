<?php

use App\Http\Controllers\API\RegistrationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [RegistrationController::class, 'register']);
Route::post('/login', [RegistrationController::class, 'login']);

// Route for fetching all thematic areas

Route::get('/thematic-areas', [RegistrationController::class, 'index']);



Route::get('/vswa-headquarters', [RegistrationController::class, 'head_quarters']);

// Route for creating a new thematic area
Route::post('/thematic-areas', [RegistrationController::class, 'store']);


// Route for getting a single VSWA Head Quarter by ID
Route::get('/vswa-head-quarters/{id}', [RegistrationController::class, 'show']);

//  NatureOfAuthorization

Route::get('/NatureOfAuthorization', [RegistrationController::class, 'NatureOfAuthorization']);

// Route::post('/logout', [RegistrationController::class, 'logout'])->middleware('auth:sanctum');


// Fallback route for handling 404 errors
Route::fallback(function () {
    return response()->json([
        'message' => 'Resource not found.'
    ], 404);
});
