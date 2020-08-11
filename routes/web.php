<?php

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
Route::get('nagioscheck', function () {
    return 'GordonsAlive';
})->name("nagios-check");

Route::get('/', function () {
    return view('welcome');
});
Route::get('ds', 'DigitalSignageController@test');
Route::get('asset/{id}', 'AssetBankController@getAssetByID');
Route::get('group/{id}', 'AssetBankController@get_recent_photos_from_group');
Route::get('list-categories', 'AssetBankController@listAssetBankCategories');
Route::get('test/{id}', 'AssetBankController@fredtest');
Route::get('attributes', 'AssetBankController@getAttributes');
Route::get('related-events/{searchTerm}/{exclude?}', 'AssetBankController@relatedEvents');
/*
|--------------------------------------------------------------------------
| For The Website
|--------------------------------------------------------------------------
|
| Specific routes that are used fo the Asset Bank Syncing system for the
| new 2016-2017 website.
|
*/

Route::group(['prefix' => 'forwebsite'], function () {

    Route::get('{id}', 'AssetBankController@getAssetInfoForWebsite')->name("assetInfoWeb");
    Route::get('{id}/photo/{target?}', 'ImageController@displayImage')->name("resizedImage");
    Route::get('{id}/related', 'AssetBankController@relatedImages')->name("relatedImages");
});

/*
|--------------------------------------------------------------------------
| Database Admin
|--------------------------------------------------------------------------
|
| Again for the new 2016-2017 website, these routes are what manage the
| Asset Bank database, so that the photo publishing to csweb02 still works.
|
*/

Route::group(['prefix' => 'database'], function () {
    Route::get('check/{path?}', 'AssetBankUpdateController@searchCriteria');
    Route::get('publish/{path}');
    Route::get('update/{path}');
    Route::get('run-update', 'AssetBankUpdateController@run_database_update');
});

/*
|--------------------------------------------------------------------------
| Smugmug API Wrapper
|--------------------------------------------------------------------------
|
| This is a controller that interacts with the SmugMug API.
|
*/

Route::group(['prefix' => 'smugmug'], function () {
    Route::get('{username}/{endpoint}', 'SmugMugController@base');
});
