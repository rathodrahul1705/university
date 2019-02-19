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
    return view('home');
});
Route::get('result_page','details_save@result_page');
Route::get('commerce_page','details_save@commerce_page');
Route::get('science_page','details_save@science_page');
Route::get('others_page_faculties','details_save@others_page_faculties');
Route::get('contact_page','details_save@contact_page');
Route::get('about_university','details_save@about_university');
Route::get('technology_page','details_save@technology_page');
Route::get('sports_page','details_save@sports_page');
Route::get('law_page','details_save@law_page');
Route::get('hostel_page','details_save@hostel_page');
Route::get('library_page','details_save@library_page');
Route::get('others_page','details_save@others_page');
Route::get('arts_page','details_save@arts_page');
Route::get('scholership_page','details_save@scholership_page');
Route::get('convocation_page','details_save@convocation_page');
Route::get('Alumni_page','details_save@Alumni_page');
Route::get('Examination_page','details_save@Examination_page');
Route::get('Brouchure_page','details_save@Brouchure_page');
Route::get('login_page','details_save@login_page');
Route::post('/login_save','details_save@login_save');
Route::get('/register','details_save@register');
Route::post('/registration_details_save','details_save@registration_details_save');
Route::get('/personal_details','details_save@personal_details');
Route::post('/detail_submit','details_save@detail_submit');
Route::post('/academic_details','details_save@academic_details');
Route::post('/student_category','details_save@student_category');
Route::post('/payment_details','details_save@payment_details');
Route::get('/forgot_password','details_save@forgot_password');
Route::post('/forgot_password_save','details_save@forgot_password_save');
// Route::get('/mail','details_save@mail');
// Route::post('/send','details_save@mail');

Route::get('/verify_mail/{string}', 'details_save@verify_mail');
Route::get('/confirm_forgot_password/{string}','details_save@confirm_forgot_password');
Route::get('/pdf', function() {
	return view('pdf');
});

// // Route::get('/func_pdf', 'details_save@func_pdf');
// Route::get('/import_data','details_save@import_data');
// // Route::get('/pdf','CustomerController@export_pdf');
// Route::get('/pdf','details_save@export_pdf');
Route::get('/import_data','details_save@import_data');
Route::get('/pdf','details_save@export_pdf');

// ----Ajay's Routes sports---------
Route::get('/sports','SportsController@sports');
Route::get('/events','SportsController@events');
Route::get('/cricket_registration','SportsController@cricket_registration');
Route::post('/cricket_details','SportsController@cricket_details');
Route::get('/football_registration','SportsController@football_registration');
Route::get('/Kabaddi_registration','SportsController@Kabaddi_registration');
Route::get('/PUBG_registration','SportsController@PUBG_registration');
Route::get('/Tennis_registration','SportsController@Tennis_registration');
// -------------------------