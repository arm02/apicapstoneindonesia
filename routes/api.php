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