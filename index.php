<?php
declare(strict_types=1);

use Core\Core;

require 'autoload.php';

$core = new Core;
try {
	$core->run();
} catch (Exception $e) {
	echo $e->getMessage();
}