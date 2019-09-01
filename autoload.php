<?php declare(strict_types=1);
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:\root\webnodeapp');
spl_autoload_extensions('.php');
spl_autoload_register('myAutoloader');

function myAutoloader($className)
{
	include 'C:\root\webnodeapp\\' . $className . '.php';
}
