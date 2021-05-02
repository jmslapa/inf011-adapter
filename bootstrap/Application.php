<?php

namespace Bootstrap;

use App\Adapters\FileServiceAdapter;
use App\Contracts\Services\FileServiceContract;
use Mf\Bootstrap\Application as BootstrapApplication;
use Mf\Container\Container;
use Plugins\PDF\Adaptee;
use ReflectionClass;

class Application extends BootstrapApplication
{
    protected function loadRoutes(): array
    {
        $routes  = require src('routes/web.php');
        return $routes;
    }

    protected function boot()
    {
        parent::boot();
        $container = Container::getInstance();
        $container->bind(FileServiceContract::class, fn() => FileServiceAdapter::getInstance());
        $this->loadPlugins();
    }

    private function loadPlugins()
    {
        $dirs = preg_grep('/^([^.])/', scandir(src('plugins')));
        foreach ($dirs as $dir) {
            $className = "\\Plugins\\$dir\\Adaptee";
            if (class_exists($className)) {
                Container::getInstance()->bind(strtoupper($dir), $className);
            }
        }
    }
}
