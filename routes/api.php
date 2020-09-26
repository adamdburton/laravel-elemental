<?php

// Api routes.

// All are prefixed by `config('elemental.prefix')`

//Route::get('elements/{type}')->uses('Api\\ElementController@index')->name('elements.index');
//Route::get('elements/{type}/{id}')->uses('Api\\ElementController@show')->name('elements.show');

Route::group(['prefix' => 'assets', 'as' => 'assets.'], function () {
    Route::apiResource('volumes', 'Api\\Assets\\VolumeController');
    Route::apiResource('assets', 'Api\\Assets\\AssetsController');
});

Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
    Route::apiResource('categories', 'Api\\Categories\\CategoriesController');
    Route::apiResource('groups', 'Api\\Categories\\GroupsController');
});

Route::group(['prefix' => 'entries', 'as' => 'entries.'], function () {
    Route::apiResource('sections', 'Api\\Entries\\SectionsController');
    Route::apiResource('entries', 'Api\\Entries\\EntriesController');
});

//Route::get('entries/sections')->uses('Api\\EntriesController@index')->name('entries.sections.index');
