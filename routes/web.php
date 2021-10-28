<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UsergroupController;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


// Route::get('/user', function () {

//     return Inertia::render('User');

// })->name('user');



Route::middleware(['auth:sanctum', 'verified'])->get('/user', function () {
    return Inertia::render('User/index');
})->name('user');


// Route::get('/usergroup', [UsergroupController::class, 'index'])
//     ->name('usergroup')
//     ->middleware('auth:sanctum');



// Route::middleware(['auth:sanctum', 'verified'])->get('/usergroup', function () {
//     return Inertia::render('Usergroup');
// })->name('usergroup');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


    // Route::group( ['middleware' => 'auth:sanctum','prefix' => 'admin'], function()
    // {
    //     Route::get('/usergroup/create', [UsergroupController::class, 'index'])->name('usergroup');
    // });



    Route::group( ['middleware' => 'auth:sanctum','prefix' => 'admin'], function()
    {
       // Route::get('/usergroup/create', [UsergroupController::class, 'index'])->name('usergroup');

Route::get('/usergroup/create',[UsergroupController::class, 'create'])->name("usergroup");
Route::get('/usergroup/create/{id}',[UsergroupController::class, 'create'])->name("usergroup");
Route::get('/usergroup/list',[UsergroupController::class, 'list'])->name("usergroup");
Route::get('/usergroup/load',[UsergroupController::class, 'load'])->name("usergroup");
Route::get('/usergroup/status/{id}',[UsergroupController::class, 'status'])->name("usergroup");
Route::get('/usergroup/delete/{id}',[UsergroupController::class, 'delete'])->name("usergroup");
Route::get('/usergroup/permission/{id}',[UsergroupController::class, 'permission'])->name("usergroup");
Route::post('/usergroup/permission/{id}',[UsergroupController::class, 'permission'])->name("usergroup");
Route::post('/usergroup/create/{id}',[UsergroupController::class, 'create'])->name("usergroup");
Route::post('/usergroup/create',[UsergroupController::class, 'create'])->name("usergroup");

    });




// Route::inertia('/user', 'User');

