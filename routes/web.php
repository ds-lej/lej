<?php

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

// Main page
// ============
$mainRoute = Route::get('/', function () {
    return view('index');
});


// Auth
// ============
$configAuth = config('auth');
if ($configAuth['isAuth'])
{
    $mainRoute->middleware('auth');

    Route::auth([
        'register' => $configAuth['register'],
        'reset'    => $configAuth['reset'],
        'verify'   => $configAuth['verify'],
    ]);
}