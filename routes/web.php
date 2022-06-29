<?php

use App\Http\Controllers\ShowBlogController;
use App\Models\BlogCategory;
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

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/user', function() {
    $pageTitle = "Template User";
    return view('user', compact('pageTitle'));
})->name('template.user');
Route::get('/template/profile', function() {
    $pageTitle = "Template Profile";
    return view('profile', compact('pageTitle'));
})->name('template.profile');

Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::get('/dashboard', function() {
    $pageTitle = "Dashboard";
    return view('dashboard', compact('pageTitle'));
})->name('dashboard');

Route::get('/register', function() {
    return view('register');
})->name('register');

// Route::get('/password-reset', function() {
//     return 'password reset';
// })->name('password.reset');
// Route::get('/password-email', function() {
//     return 'password email';
// })->name('password.email');
// Route::get('/password-request', function() {
//     return 'password request';
// })->name('password.request');

Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', function() {
        $pageTitle = "Dashboard";
        return view('dashboard', compact('pageTitle'));
    })->name('dashboard');

    // begin::category
    Route::get('/blog-category/json', [BlogCategory::class, 'json'])->name('blog-category.json');
    Route::resource('blog-category', BlogCategory::class);
    // end::category
});


Route::get('/', [ShowBlogController::class, 'index'])->name('dashboard-blog');