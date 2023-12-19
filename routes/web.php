<?php

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


//Controllers
Route::get('/', [App\Http\Controllers\Controller::class,
           'master'])->name('layouts.master');

Route::get('/home', [App\Http\Controllers\Controller::class,
           'home'])->name('content');


//Controllers\f1ContentCRUDController, Read
Route::get('/f1ContentCRUDControllers/loadF1API',
           [App\Http\Controllers\f1ContentCRUDControllers\loadAPIController::class,
           'loadF1API'])->name('content');

Route::get('/f1ContentCRUDControllers/loadDBContent',
           [App\Http\Controllers\f1ContentCRUDControllers\loadDBController::class,
           'loadDBContent'])->name('content');

Route::post('/f1ContentCRUDControllers/findDBController',
            [App\Http\Controllers\f1ContentCRUDControllers\findDBController::class,
            'searchDB'])->name('content');

// Controllers\f1ContentCRUDController, Create, Update, Delete

//Add
Route::get('/f1ContentCRUDControllers/sidebar',
            [App\Http\Controllers\f1ContentCRUDControllers\addToDBController::class,
            'addDBEntryField'])->name('sidebar');

Route::post('/f1ContentCRUDController/sidebarAdd',
            [App\Http\Controllers\f1ContentCRUDControllers\addToDBController::class,
            'addDBEntry'])->name('sidebarAdd');

// Delete
Route::post('/f1ContentCRUDControllers/sidebarDelete',
            [App\Http\Controllers\f1ContentCRUDControllers\editDBController::class,
            'editDBEntry'])->name('sidebarDelete');

// Edit
Route::post('/f1ContentCRUDControllers/sidebarEdit',
            [App\Http\Controllers\f1ContentCRUDControllers\editDBController::class,
            'editDBEntry'])->name('sidebarEdit');

Route::post('/f1ContentCRUDControllers/changeDBEntrys',
            [App\Http\Controllers\f1ContentCRUDControllers\editDBController::class,
            'saveChangesToDB'])->name('changeDBEntrys');

