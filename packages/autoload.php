<?php


spl_autoload_register('lessgap_psr4_autoloader');
/**
 * An example of a project-specific implementation.
 *
 * @param string $class The fully-qualified class name.
 * @return void
 */
function lessgap_psr4_autoloader($class)
{
    // replace namespace separators with directory separators in the relative
    // class name, append with .php
    $class_path = str_replace('\\', '/', $class);
    $file = __DIR__ . '/Lessgap/src/' . $class_path . '.php';
    $file = str_replace('/src/Lessgap', '/src', $file);
    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
}
