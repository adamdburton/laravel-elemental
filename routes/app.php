<?php

// SPA routes.

// Asset pass-through for Elemental SPA.

Route::get('asset/{filename}')
    ->uses('AppController@asset')
    ->name('asset')
    ->where('filename', '(fonts|js|css)?(\/)?[a-zA-Z0-9._-]+\.(png|css|js|map|ico|ttf|woff)');

// Catch all for Elemental SPA.

Route::get('{any?}')
    ->uses('AppController@app')
    ->name('catchall')
    ->where('any', '.*');