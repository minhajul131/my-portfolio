<?php

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
//     return view('pages.index');
// });
Route::get('/',[App\Http\Controllers\PagesController::class, 'index'])->name('index');
Route::get('/admin/dashboard',[App\Http\Controllers\PagesController::class, 'dashboard'])->name('admin.dashboard');

Route::get('/admin/home',[App\Http\Controllers\HomePageController::class, 'index'])->name('admin.home');
Route::put('/admin/home',[App\Http\Controllers\HomePageController::class, 'update'])->name('admin.home.update');

Route::get('/admin/project/create',[App\Http\Controllers\ProjectPageController::class, 'create'])->name('admin.project.create');
Route::post('/admin/project/store',[App\Http\Controllers\ProjectPageController::class, 'store'])->name('admin.project.store');
Route::get('/admin/project/list',[App\Http\Controllers\ProjectPageController::class, 'list'])->name('admin.project.list');
Route::get('/admin/project/edit/{id}',[App\Http\Controllers\ProjectPageController::class, 'edit'])->name('admin.project.edit');
Route::post('/admin/project/update/{id}',[App\Http\Controllers\ProjectPageController::class, 'update'])->name('admin.project.update');
Route::delete('/admin/project/destroy/{id}',[App\Http\Controllers\ProjectPageController::class, 'destroy'])->name('admin.project.destroy');

Route::get('/admin/about',[App\Http\Controllers\AboutPageController::class, 'index'])->name('admin.about');
Route::put('/admin/about',[App\Http\Controllers\AboutPageController::class, 'update'])->name('admin.about.update');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
