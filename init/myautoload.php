<?php
/**
 * Pour l'autoloading des class
 */

spl_autoload_register('classAutoloading');

function classAutoloading($class)
{
    $namespaceRoot = "App\\";
    $baseDir = __DIR__ . "/app/";

    if (strncmp($namespaceRoot, $class, strlen($namespaceRoot)) !== 0) {
        return;
    }

    $relativeClass = substr($class, strlen($namespaceRoot));
    $classFilePath = $baseDir . str_replace("\\", "/", $relativeClass) . ".php";

    if (file_exists($classFilePath)) {
        include_once $classFilePath;
    }
}
