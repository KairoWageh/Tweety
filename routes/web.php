<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetsController;
use App\Http\Controllers\TweetLikesController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\ExploreController;

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
// setup language url

Route::get('locale/{locale}', function ($locale){
    //Session::put('locale', $locale);
    App::setlocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::middleware('auth')->group(function () {
//    Route::view('/tweets', 'tweets.index')->name('home');

	Route::get('/tweets', [TweetsController::class, 'index'])->name('home');
	Route::post('/tweets', [TweetsController::class, 'store']);
	Route::delete('/tweets/{tweet}/destroy', [TweetsController::class, 'destroy'])->name('delete_tweet');
	Route::post('tweets/{tweet}/like', [TweetLikesController::class, 'store']);
	Route::delete('tweets/{tweet}/like', [TweetLikesController::class, 'destroy']);


	Route::get('/profiles/{user:username}', [ProfilesController::class, 'show'])->name('profile');
	Route::post('profiles/{user:username}/follow', [FollowsController::class, 'store'])->name('follow');
	Route::get('profiles/{user:username}/edit', [ProfilesController::class, 'edit'])->middleware('can:edit,user');
	Route::patch('profiles/{user:username}', [ProfilesController::class, 'update'])->middleware('can:edit,user');
	Route::get('explore', ExploreController::class)->name('explore');
});


