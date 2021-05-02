<?php

namespace App\Contracts\Adptees;

interface FileServiceAdapteeContract
{
    public function render(string $fileName, string $filePath);
}
