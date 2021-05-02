<?php

namespace Plugins\PDF;

use App\Contracts\Adptees\FileServiceAdapteeContract;

class Adaptee implements FileServiceAdapteeContract
{
    public function render(string $fileName, string $filePath): void
    {
        header("Content-type: application/pdf");
        header("Content-Disposition: inline; filename=$fileName.pdf");
        @readfile($filePath);
    }
}
