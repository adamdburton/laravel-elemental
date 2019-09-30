<?php

// Api routes.
// All are prefixed by `config('elemental.prefix')`

use Click\Elemental\Http\Middleware\ValidateElementRequest;

Route::group([
    'prefix' => 'api',
    'as' => 'api.',
    'middleware' => ValidateElementRequest::class
], function () {
    Route::apiResource('element', 'Api\\ElementController');
    Route::apiResource('elementType', 'Api\\ElementTypeController', ['only' => ['index', 'show']]);
});

