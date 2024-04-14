<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertiesController;

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

// Default Laravel welcome page
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Static About page
Route::get('/about', function () {
    return view('about');
})->name('about');

// Routes for property resource
// Utilize the Route::controller method to define several routes that share a controller.
Route::controller(PropertiesController::class)->group(function () {
    // Displays the form to create a new property.
    Route::get('/properties/create', 'create')->name('properties.create');
    // Stores the new property data.
    Route::post('/properties', 'store')->name('properties.store');
    // Lists all properties.
    Route::get('/properties', 'index')->name('properties.index');
    // Shows a single property's detailed view.
    Route::get('/properties/{property}', 'show')->name('properties.show');
    // The {property} parameter will utilize route model binding to inject the Property model.
});
