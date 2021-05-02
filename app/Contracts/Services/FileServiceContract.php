<?php

namespace App\Contracts\Services;

interface FileServiceContract
{
    public function render(string $fileName, string $filePath): void;
}
