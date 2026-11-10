<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
if (file_exists(__DIR__.'/../vendor/autoload.php')) {
    $loader = require __DIR__.'/../vendor/autoload.php';
} elseif (file_exists(__DIR__.'/../../vendor/autoload.php')) {
    $loader = require __DIR__.'/../../vendor/autoload.php';
    if ($loader instanceof \Composer\Autoload\ClassLoader) {
        $appDir = dirname(__DIR__).'/app';
        if (is_dir($appDir)) {
            $classMap = [];
            $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($appDir));
            foreach ($iterator as $file) {
                if ($file->isFile() && $file->getExtension() === 'php') {
                    $subPath = substr($file->getPathname(), strlen($appDir) + 1);
                    $className = 'App\\'.str_replace(['/', '\\', '.php'], ['\\', '\\', ''], $subPath);
                    $classMap[$className] = $file->getPathname();
                }
            }
            $loader->addClassMap($classMap);
            $loader->setPsr4('App\\', [$appDir]);
        }
    }
} else {
    $loader = require __DIR__.'/../vendor/autoload.php';
}

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());
