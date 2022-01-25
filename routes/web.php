<?php

use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\StoriesController;

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

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);

Route::middleware(['auth'])->group(function(){
    Route::resource('stories' , StoriesController::class);
    // Route::get('/stories', [StoriesController::class ,'index'])->name('stories.index');
    //     Route::get('/stories/{story}', [StoriesController::class ,'show'])->name('stories.show');
});
Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/story/{activeStory:slug}', [App\Http\Controllers\DashboardController::class, 'show'])->name('dashboard.show');
Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/email', [App\Http\Controllers\DashboardController::class, 'email'])->name('dashboard.email');

Route::namespace('Admin')->prefix('admin')->middleware(['auth'])->group(function(){

    Route::get('/deleted_stories', [StoriesController::class ,'index'])->name('admin.stories.index');
    Route::put('/stories/restore/{id}', [StoriesController::class ,'restore'])->name('admin.stories.restore');
    Route::delete('/stories/delete/{id}', [StoriesController::class ,'delete'])->name('admin.stories.delete');
});


Route::get('/image' , function(){
   $imgPath = public_path('storage/one.jpg');
   $img = Image::make($imgPath)->resize('225' , '100');
   return $img->response('jpg');
});