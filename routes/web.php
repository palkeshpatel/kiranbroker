<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserDetailController;
use App\Http\Controllers\SendEmailController;
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

/*download_brochure*/
Route::get('download-brochure-sendotp','App\Http\Controllers\AgreementFormController@sendotp');
Route::get('download-brochure','App\Http\Controllers\AgreementFormController@create_brochure');
Route::post('store-download-brochure','App\Http\Controllers\AgreementFormController@store_brochure');

Route::post('admin/amenities/remove/{id?}','App\Http\Controllers\ExtendedBreadFormFieldsMediaController@remove');
Route::post('admin/gallery/remove/{id?}','App\Http\Controllers\ExtendedBreadFormFieldsMediaController@remove');

Route::get('/admin/amenities', function () {
    return redirect('/admin/property-detail-master');
});
Route::get('/admin/gallery', function () {
    return redirect('/admin/property-detail-master');
});

Route::get('/admin/send-emails',[SendEmailController::class,'index']);
Route::get('/admin/send-emails/{batch_no}',[SendEmailController::class,'show']);
Route::delete('/admin/send-emails/{batch_no}',[SendEmailController::class, 'destroy']);
Route::get('/admin/email',[SendEmailController::class,'email']);
Route::post('/admin/email-store',[SendEmailController::class,'store']);

Route::get('/admin/user-details',[UserDetailController::class,'index']);
Route::get('/admin/validate-email',[UserDetailController::class,'validate_email']);
Route::post('/admin/user-details',[UserDetailController::class,'index']);
Route::get('/admin/user-store',[UserDetailController::class,'store']);
Route::get('/admin/user-edit',[UserDetailController::class,'edit']);
Route::delete('admin/users-details/{id}',[UserDetailController::class, 'destroy']);
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('agreement-form/{slug?}','App\Http\Controllers\PropertyController@agreement_form');
Route::get('properties','App\Http\Controllers\PropertyController@GetProperty');
Route::get('properties/{type}','App\Http\Controllers\PropertyController@GetPropertyList');
Route::get('properties_detail/{slug}','App\Http\Controllers\PropertyController@GetPropertyDetail');

/*Project*/
Route::get('projects','App\Http\Controllers\ProjectController@GetProjectList');
Route::get('projects_detail/{slug}','App\Http\Controllers\ProjectController@GetProjectDetail');
/*Project*/

Route::post('contact','App\Http\Controllers\AgreementFormController@contact');
Route::post('inquiry','App\Http\Controllers\AgreementFormController@inquiry');

Route::get('admin/send-brochure','App\Http\Controllers\AgreementFormController@send_brochure');
Route::post('check-email','App\Http\Controllers\AgreementFormController@check_email');
Route::post('get-signature', 'App\Http\Controllers\AgreementFormController@get_signature');
Route::post('/AgreementForm-Create', 'App\Http\Controllers\AgreementFormController@store');
Route::get('/{slug?}/{param1?}/{param2?}/{param3?}/{param4?}','App\Http\Controllers\CentralController@index')->name('home');

