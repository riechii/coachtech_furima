<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\PaymentController;

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

Route::get('/', [ItemController::class, 'index'])->name('index');

Route::middleware('auth')->group(function () {

});

Route::get('/sell', [ItemController::class, 'sell'])->name('sell');
Route::post('/sell/listing', [ItemController::class, 'listing'])->name('listing');
Route::get('/item/{item_id}', [ItemController::class, 'item'])->name('item');
Route::get('/search', [ItemController::class, 'search'])->name('search');
Route::get('/comment/form/{item_id}', [CommentController::class, 'commentForm'])->name('commentForm');
Route::post('/comment', [CommentController::class, 'comment'])->name('comment');
Route::delete('/comment/delete/{comment}', [CommentController::class, 'commentDelete'])->name('commentDelete');
Route::post('/favorite', [FavoriteController::class, 'favorite'])->name('favorite');
Route::get('/favorite/list', [FavoriteController::class, 'favoriteList'])->name('favoriteList');
Route::get('/mypage', [MypageController::class, 'mypage'])->name('mypage');
Route::get('/mypage/profile', [MypageController::class, 'profile'])->name('profile');
Route::post('/mypage/profile/update/{id}', [MypageController::class, 'profileUpdate'])->name('profileUpdate');
Route::get('/purchase/list', [MypageController::class, 'purchaseList'])->name('purchaseList');

Route::get('/purchase/{item_id}', [PaymentController::class, 'purchase'])->name('purchase');
Route::get('/payment/{item_id}', [PaymentController::class, 'payment'])->name('payment');
Route::post('/payment/change', [PaymentController::class, 'paymentChange'])->name('paymentChange');
Route::post('/buy', [PaymentController::class, 'buy'])->name('buy');






Route::get('/upload/form', [ManagementController::class, 'uploadForm'])->name('uploadForm');
Route::post('/upload', [ManagementController::class, 'upload'])->name('upload');
Route::post('/upload/category', [ManagementController::class, 'uploadCategory'])->name('uploadCategory');

