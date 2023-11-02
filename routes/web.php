<?php

use App\Http\Controllers\AdPositionController;
use App\Http\Controllers\AdvertisementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\NewsdetailsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VideoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[FrontendController::class,'index']);
Route::get('/categori',[FrontendController::class,'categori'])->name('categori');
Route::get('/about',[FrontendController::class,'about'])->name('about');
Route::get('/latest_news',[FrontendController::class,'latest_news'])->name('latest_news');
Route::get('/contact',[FrontendController::class,'contact'])->name('contact');
Route::get('/detail/{id}',[FrontendController::class,'details'])->name('frontend-details');


Route::get('/login',[FrontendController::class, 'showLogin'])->name('login');
Route::post('/login',[FrontendController::class,'login']);


Route::get('/dashboard',[FrontendController::class, 'dashboard'])->name('dashboard');
Route::post('/logout',[FrontendController::class,'logout']);

Route::get('/news-details',[NewsdetailsController::class,'index'])->name('newsdetails.index');
Route::get('/newsdetails/create',[NewsdetailsController::class,'create'])->name('newsdetails.create');
Route::post('/newsdetails/store', [NewsdetailsController::class, 'store'])->name('newsdetails.store');

Route::get('/newsdetails/{id}/edit', [NewsdetailsController::class, 'edit'])->name('newsdetails.edit');
Route::put('/newsdetails/{id}/update', [NewsdetailsController::class, 'update'])->name('newsdetails.update');
Route::delete('/newsdetails/{id}/delete', [NewsdetailsController::class, 'delete'])->name('newsdetails.delete');


Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
// Show the create category form
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');

// Store a new category
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');

// Update a specific category
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');

// Delete a specific category
Route::delete('/categories/{category}', [CategoryController::class, 'delete'])->name('categories.delete');

Route::get('/videos', [VideoController::class, 'index'])->name('videos.index');
Route::get('/videos/create', [VideoController::class, 'create'])->name('videos.create');
Route::post('/videos/store', [VideoController::class, 'store'])->name('videos.store');
Route::get('/videos/{id}/edit', [VideoController::class, 'edit'])->name('videos.edit');
Route::put('/videos/{id}/update', [VideoController::class, 'update'])->name('videos.update');
Route::delete('/videos/{id}/delete', [VideoController::class, 'delete'])->name('videos.delete');

Route::get('/position', [AdPositionController::class, 'index'])->name('positions.index');
Route::get('/position/create', [AdPositionController::class, 'create'])->name('positions.create');
Route::post('/position/store', [AdPositionController::class, 'store'])->name('positions.store');
Route::get('/position/{id}/edit', [AdPositionController::class, 'edit'])->name('positions.edit');
Route::put('/position/{id}/update', [AdPositionController::class, 'update'])->name('positions.update');

Route::delete('/position/{id}/delete', [AdPositionController::class, 'delete'])->name('positions.delete');

Route::get('/advertisement', [AdvertisementController::class, 'index'])->name('advertisements.index');
Route::get('/advertisement/create', [AdvertisementController::class, 'create'])->name('advertisements.create');
Route::post('/advertisement/store', [AdvertisementController::class, 'store'])->name('advertisements.store');


