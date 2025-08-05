<?php
spl_autoload_register('classRegistration');

function classRegistration($class)
{
    $namespaceRoot = "App\\";
    $baseDir = __DIR__ . "/App/";

    if (strncmp($namespaceRoot, $class, strlen($namespaceRoot)) !== 0) {
        return;
    }

    $relativeClass = substr($class, strlen($namespaceRoot));
    $classFilePath = $baseDir . str_replace("\\", "/", $relativeClass) . ".php";

    if (file_exists($classFilePath)) {
        include_once $classFilePath;
    }
}
