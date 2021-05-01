<?php

namespace Support\Abstracts\Http\Controllers;

use Mf\Abstracts\Http\Controllers\Controller as MfController;

class Controller extends MfController
{
    protected function getLayoutsPath(): string
    {
        return 'app/Views/layouts/';
    }

    protected function getViewsPath(): string
    {
        return 'app/Views/';
    }
}
