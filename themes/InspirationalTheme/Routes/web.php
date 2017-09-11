<?php

Route::group(['middleware' => 'web', 'prefix' => 'inspirationaltheme', 'namespace' => 'Themes\InspirationalTheme\Http\Controllers'], function()
{
    Route::get('/', 'InspirationalThemeController@index');
});
