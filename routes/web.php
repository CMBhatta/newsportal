<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\NewsdetailsController;
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
Route::get('/frontend-details',[FrontendController::class,'details'])->name('frontend-details');


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



