<?php

// Api routes.
// All are prefixed by `config('elemental.prefix')`

use Click\Elemental\Http\Middleware\ValidateElementRequest;

Route::group([
    'prefix' => 'api',
    'as' => 'api.',
//    'middleware' => ValidateElementRequest::class
], function () {
    Route::get('elements/{type}')->uses('Api\\ElementController@index');
    Route::get('elements/{type}/{id}')->uses('Api\\ElementController@show');
});
