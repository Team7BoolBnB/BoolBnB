<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::middleware("auth")->group(function () {
    Route::get("/accommodations/sponsorship","Api\HomeController@sponsorshipData");
    Route::get("/sponsorship","Api\PaymentController@generate");
    Route::post("/make/payment","Api\PaymentController@makePayment");
    Route::post("/update/database","Api\PaymentController@update");
    Route::get("/messages","Api\MessageController@index");
    Route::get("/messages/{message}","Api\MessageController@show");


    });

Route::get("/accommodations","Api\HomeController@index");
Route::post("/messages","Api\MessageController@store");



/* Route::middleware('auth')->get("/accommodations/sponsorship","Api\HomeController@sponsorshipData");

Route::get("/sponsorship","Api\PaymentController@generate");
Route::post("/make/payment","Api\PaymentController@makePayment"); */

/* Route::get("/accommodations/sponsorship","Api\HomeController@sponsorshipData"); */


Route::get("/advancedsearch","Api\AdvancedSearchController@index");

Route::get("/advancedsearch/{query}","Api\AdvancedSearchController@filter");
Route::get("/accommodations/{slug}","Api\AdvancedSearchController@show");


