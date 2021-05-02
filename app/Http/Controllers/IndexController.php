<?php

namespace App\Http\Controllers;

use App\Contracts\Services\FileServiceContract as FileService;
use Mf\Container\Container;
use Support\Abstracts\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $this->render('home.index');
    }

    public function loadFile()
    {
        $container = Container::getInstance();
        ['name' => $fileName, 'tmp_name' => $filePath] = $_FILES['file'];
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);

        if (!($adaptee = $container->resolve(strtoupper($ext)))) {
            $this->view->error = (object) [
                'type' => 'danger',
                'message' => "Arquivos .$ext não são suportados."
            ];
            $this->render('home.index');
        } else {
            $adapter = $container->resolve(FileService::class);
            $adapter->setAdaptee($adaptee);
            $adapter->render($fileName, $filePath);
        }
    }
}
