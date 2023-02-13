<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [AuthController::class, 'login_view'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register_view'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register');



Route::middleware(['auth'])->group(function () {
    Route::get('/posts/create', [PostController::class, 'post_create_view'])->name('post.create');
    Route::post('/posts/create', [PostController::class, 'post_create'])->name('post.create');
    Route::get('/plan/upgrade-downgrade', [SubscriptionController::class, 'changePlan'])->name('subscription.change');
    Route::post('/plan/upgrade-downgrade', [SubscriptionController::class, 'upgradeDowngradePlan'])->name('subscription.change');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
})
Route::get('/posts', [PostController::class, 'index'])->name('post.list');
Route::get('/posts/show/{id}', [PostController::class, 'post_view'])->name('post.view');
