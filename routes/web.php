<?php

// Web routes.

Route::get('/')
    ->uses('CmsController@entry')
    ->name('cms.entry')
    ->where('any', '.*');

// Action route.

Route::post('/')
    ->uses('CmsController@action')
    ->name('cms.action')
    ->where('any', '.*');