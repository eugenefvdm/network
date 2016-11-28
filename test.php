<?php

require_once __DIR__ . '/vendor/autoload.php'; // Autoload files using Composer autoload

use Network\Network;

$result = Network::whois('snowball.co.za');
die(print_r($result, 1));

//echo Network::ping('196.25.1.1') . "\n"; // Test ping
