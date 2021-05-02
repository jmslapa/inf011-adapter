<?php

namespace App\Adapters;

use App\Contracts\Adptees\FileServiceAdapteeContract;
use App\Contracts\Services\FileServiceContract;

class FileServiceAdapter implements FileServiceContract
{
    private static ?FileServiceAdapter $instance = null;
    private FileServiceAdapteeContract $adaptee;

    private function __construct()
    {
    }

    public static function getInstance(): FileServiceAdapter
    {
        if (is_null(FileServiceAdapter::$instance)) {
            FileServiceAdapter::$instance = new FileServiceAdapter();
        }
        return self::$instance;
    }

    public function setAdaptee(FileServiceAdapteeContract $adaptee): void
    {
        $this->adaptee = $adaptee;
    }

    public function render(string $fileName, string $filePath): void
    {
        $this->adaptee->render($fileName, $filePath);
    }
}
