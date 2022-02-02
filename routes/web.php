<?php

use App\Http\Controllers\ContactsController;
use App\Http\Middleware\Authenticate;
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

// Contacts main routes (resource). Adding Middleware calls redirectTo method of Authenticate Middleware
Route::resource('contacts', ContactsController::class)->middleware(Authenticate::class, 'redirectTo');

Route::get('/', function () { return view('homepage');});

//Route for languages at edit form
Route::get('contacts/{contact}/edit/{lang?}', [ContactsController::class, 'edit']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';
