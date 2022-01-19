<?php

use App\Http\Controllers\ContactsController;
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

//Default page of laravel
Route::view('/', 'welcome');


//Name of the url and the controller methods to call that will add all the methods of a resource
Route::resource('contacts', ContactsController::class);
