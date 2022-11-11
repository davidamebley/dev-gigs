<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// All Listings
Route::get('/', [ListingController::class, 'index']);

// Show Create A listing Form
Route::get('/listings/create', [ListingController::class, 'create']);

// Store a New Listing Data
Route::post('/listings', [ListingController::class, 'store']);

// Display Edit Listing Form for Update
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

// Update Edited Listing
Route::put('/listings/{listing}', [ListingController::class, 'update']);

// Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);


// Get Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Show Register Form
Route::get('/register', [UserController::class, 'register']);

// Create a new user/ Register User
Route::post('/users', [UserController::class, 'store']);
