<?php

use Mf\Routes\Route;

return [
    Route::group([        
        Route::get('/', 'IndexController@index')
    ])->namespace("App\\Http\\Controllers")
];