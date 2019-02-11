<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Api'], function () {
   Route::resource('about', 'AboutController');
   Route::resource('about2', 'About2Controller');
   Route::resource('client', 'ClientController');
   Route::resource('kelebihan', 'KelebihanController');
   Route::resource('newsletter', 'NewsletterController');
   Route::resource('pelayanan', 'PelayananController');
   Route::resource('portofolio', 'PortofolioController');
   Route::resource('profile', 'ProfileController');
   Route::resource('slideshow', 'SlideshowController');
   Route::resource('teknologi', 'TeknologiController');	
});

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::group(['middleware' => 'auth:api'], function(){
   Route::post('details', 'API\UserController@details');
   Route::resource('about2', 'API\About2Controller');
   Route::resource('client', 'API\ClientController');
   Route::resource('kelebihan', 'API\KelebihanController');
   Route::resource('newsletter', 'API\NewsletterController');
   Route::resource('pelayanan', 'API\PelayananController');
   Route::resource('portofolio', 'API\PortofolioController');
   Route::resource('profile', 'API\ProfileController');
   Route::resource('slideshow', 'API\SlideshowController');
   Route::resource('teknologi', 'API\TeknologiController');
});