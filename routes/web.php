<?php

use Mf\Routes\Route;

return [
    Route::group([
        Route::get('/', 'IndexController@index'),
        Route::post('/load-file', 'IndexController@loadFile')
    ])->namespace("App\\Http\\Controllers"),
];
