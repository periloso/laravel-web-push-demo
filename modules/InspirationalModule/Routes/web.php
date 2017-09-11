<?php

Route::group(['middleware' => 'web', 'prefix' => 'inspirationalmodule', 'namespace' => 'Modules\InspirationalModule\Http\Controllers'], function()
{
    Route::get('/', 'InspirationalModuleController@index');
});
