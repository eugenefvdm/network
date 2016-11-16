<?php

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use Network\Network;
use Network\Ssh;

Network::test(); // Test ping

$ssh = new Ssh('dte.snowball.co.za', 'root', 'QWad2$CPad1$');
//$result = new Ssh();



// Go to the terminal (or create a PHP web server inside "tests" dir) and type:
// php tests/test.php