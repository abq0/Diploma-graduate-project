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

Route::get('/', \App\Http\Livewire\Home::class)->name('home');

Route::middleware(['auth'])->group(function () {
    // admin
    Route::get('/createdRequests', \App\Http\Livewire\CreateRequests::class)->name('createRequests');
    Route::get('/dashboard', \App\Http\Livewire\dashboardIndex::class)->name('dashboardIndex');
    Route::get('/offices', \App\Http\Livewire\Offices::class)->name('offices');
    // user
    Route::get('/properties', \App\Http\Livewire\Properties::class)->name('properties');
    Route::get('/new-properties', \App\Http\Livewire\NewProperties::class)->name('new-properties');
    Route::get('/edit-properties/{id}', \App\Http\Livewire\EditProperties::class)->name('edit-properties');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/register', \App\Http\Livewire\Register::class)->name('register');
    Route::get('/login', \App\Http\Livewire\login::class)->name('login');
});

Route::get('{slug}/properties-details/{id}', \App\Http\Livewire\propertiesDetails::class)->name('properties-details');

Route::get('/{slug}', \App\Http\Livewire\OfficeProperties::class)->name('office-properties');
