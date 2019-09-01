<?php declare(strict_types=1);
set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__);
spl_autoload_extensions('.php');
spl_autoload_register('myAutoloader');

function myAutoloader($className)
{
	include __DIR__ . '\\' . $className . '.php';
}
