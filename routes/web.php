<?php

// Web routes.
// All are prefixed by `config('elemental.prefix')`

Route::get('assets/{filename}')->uses('AppController@asset')->name('asset')->where('filename', '.*');

// Catch all endpoint for the SPA.
Route::get('{any?}')->uses('AppController')->name('app')->where('any', '.*');
