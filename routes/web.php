<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEnd\HomeController;

use App\Http\Controllers\FrontEnd\BlogController;
use App\Http\Controllers\FrontEnd\ContactController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ContactsController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\SystemController;
use App\Http\Controllers\Admin\CustomerCareController;
use CKSource\CKFinderBridge\Controller\CKFinderController;
use App\Http\Controllers\Admin\MainContentController;
use App\Http\Controllers\FrontEnd\InteriorController;
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



Route::any('/ckfinder/connector', [CKFinderController::class, 'requestAction'])
    ->name('ckfinder_connector');

Route::any('/ckfinder/browser', [CKFinderController::class, 'browserAction'])
    ->name('ckfinder_browser');

Route::any('/ckfinder/examples/{example?}', [CKFinderController::class, 'examplesAction'])
    ->name('ckfinder_examples');

Auth::routes();
//front routes
Route::group([
    'as' => 'front.',
], function () {

    Route::get('/', [HomeController::class, 'index'])
        ->name('home');

    Route::get('/search', [HomeController::class, 'search'])
        ->name('search.project');

    Route::get('/trang-chu', [HomeController::class, 'index'])
        ->name('trang-chu');

    Route::get('/san-pham', [InteriorController::class, 'index'])
        ->name('san-pham');

    Route::get('/san-pham/{slug}', [InteriorController::class, 'byCategory'])
        ->name('san-pham.child');

    Route::get('/san-pham/{slug}/{id}', [InteriorController::class, 'show'])
        ->name('san-pham.detail');

    Route::get('/he-thong-vn-vhome', [SystemController::class, 'index'])
        ->name('he-thong-vn-vhome');

    Route::get('/phan-hoi-khach-hang', [CustomerCareController::class, 'index'])
        ->name('phan-hoi-khach-hang');

    Route::get('/tin-tuc', [BlogController::class, 'index'])
        ->name('tin-tuc');

    Route::get('/tin-tuc/{slug}', [BlogController::class, 'byCategory'])
        ->name('tin-tuc.child');

    Route::get('/tin-tuc/{slug}/{id}', [BlogController::class, 'show'])
        ->name('tin-tuc-blog.detail');

    Route::get('/dang-ky-tu-van', [ContactController::class, 'index'])
        ->name('dang-ky-tu-van');

    Route::post('/dang-ky-tu-van', [ContactController::class, 'store'])
        ->name('dang-ky-tu-van.store');

});

//admin routes
Route::group([
    'as' => 'admin.',
    'middleware' => ['admin', 'auth'],
    'prefix' => 'admin',
], function () {
    Auth::routes();
    Route::get('/home', [AdminHomeController::class, 'index'])
        ->name('home');
    Route::resource('users', UsersController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('systems', \App\Http\Controllers\Admin\SystemsController::class);
    Route::resource('posts', PostsController::class);
    Route::resource('banners', BannerController::class);
    Route::resource('introduce-peoples', \App\Http\Controllers\Admin\IntroducePeoplesController::class);
    Route::resource('main-contents', MainContentController::class);
    Route::resource('contacts', ContactsController::class);
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
