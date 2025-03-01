<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\CRUD.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace' => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('user', 'UserCrudController');
    Route::crud('post', 'PostCrudController');
}); // this should be the absolute last line of this file
// Route::get('admin/register', function () {
//     return redirect()->route('backpack.auth.login');
// })->name('backpack.auth.register');

/**
 * DO NOT ADD ANYTHING HERE.
 */
