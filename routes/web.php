<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

//Common Resourse Routes: 
//index- show all listings
//show- show single listing
//create- show form to create listing
//store- save new listing
// edit- show form to edit listing
//update- save edited listing
//destroy- delete listing


//All Listings
Route::get('/', [ListingController::class, 'index']);


//Show Create Ride Form
Route::get('/listings/createOffer', [ListingController::class,
'createOffer'])->middleware('auth');


//Store Listing Data
Route::post('/listings', [ListingController::class, 
'store'])->middleware('auth');

//Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

//Update Listing Data
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

//Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

//Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

//Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show'])->name('listings.show');

//Show Register/Create Users Form
Route::get('/register', [UserController::class, 
'create'])->middleware('guest');

//Create New User
Route::post('/users', [UserController::class, 'store']);

//Logout User Out
Route::post('/logout', [UserController::class, 
'logout'])->middleware('auth'); 

//Show Login Form
Route::get('/login', [UserController::class, 
'login'])->name('login')->middleware('guest');

//Login In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
