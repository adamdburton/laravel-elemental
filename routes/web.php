<?php

// Web routes.
// All are prefixed by `config('elemental.prefix')`

// Asset pass-through.

Route::get('assets/{filename}')
    ->uses('AppController@asset')
    ->name('asset')
    ->where('filename', '(fonts\/)?[a-zA-Z0-9._-]+\.(png|css|js|map|ico|ttf|woff)');

// Catch all for the SPA.

Route::get('{any?}')
    ->uses('AppController')
    ->name('app')
    ->where('any', '.*');

