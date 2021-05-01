<?php

namespace App\Http\Controllers;

use Support\Abstracts\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $this->render('home.index');
    }
}
