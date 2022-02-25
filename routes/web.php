<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReplyController;

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
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    # Dashboard
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    # Post resource controllers
    Route::resource('posts', 'PostController');

    # Comments routes
    Route::group(['prefix' => '/comments', 'as' => 'comments.'], function() {
        // Store comment
        Route::post('/{post}', [CommentController::class, 'store'])->name('store');
    });

    # Replies routes
    Route::group(['prefix' => '/replies', 'as' => 'replies.'], function() {
        // Store reply
        Route::post('/{comment}', [ReplyController::class, 'store'])->name('store');
    });
});
