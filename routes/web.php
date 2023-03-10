<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PagesController::class, 'index'])->name('home');

Route::resource('/blog',PostController::class)->names(['index'=> 'blog']);
Route::resource('/comment', CommentController::class);

Route::get('/search', [SearchController::class, 'searchQuery'])->name('search');

Route::group(['prefix'=>'dashboard', 'middleware'=>['auth', 'verified']], function(){
   Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
});



Route::group(['prefix'=> 'admin', 'middleware'=> ['auth', 'admin'], 'as'=> 'admin.'], function(){
   Route::get('/', [HomeController::class, 'index']);
   Route::resource('/post', AdminPostController::class);
   Route::resource('/users', UserController::class);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
