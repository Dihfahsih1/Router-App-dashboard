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
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/allUnapprovedDriverAgents', 'UsersController@unapproved_driver_agent')->name('allUnapprovedDriverAgents');
Route::get('/allApprovedDriverAgents', 'UsersController@approved_driver_agent')->name('allApprovedDriverAgents');

Route::get('/updating', 'UpdatingController@updates')->name('updating');
Route::get('/allUnapprovedBodaAgents', 'UsersController@unapproved_boda_agent')->name('allUnapprovedBodaAgents');
Route::get('/allApprovedBodaAgents', 'UsersController@approved_boda_agent')->name('allApprovedBodaAgents');

Route::get('/allUnapprovedCarRentalAgents', 'UsersController@unapproved_car_rental_agent')->name('allUnapprovedCarRentalAgents');
Route::get('/allUnapprovedDeliveryAgents', 'UsersController@unapproved_delivery_agent')->name('allUnapprovedDeliveryAgents');
Route::get('/allUnapprovedMassageAgents', 'UsersController@unapproved_massage_agent')->name('allUnapprovedMassageAgents');
Route::get('/allUnapprovedMechanicAgents', 'UsersController@unapproved_mechanic_agent')->name('allUnapprovedMechanicAgents');
Route::get('/allUnapprovedPlumbingAgents', 'UsersController@unapproved_plumbing_agent')->name('allUnapprovedPlumbingAgents');

Route::get('/hist', 'UsersController@driver_hist')->name('hist');
Route::get('/customerwallet', 'UsersController@customer_wallet')->name('customerwallet');
