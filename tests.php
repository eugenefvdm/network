<?php

require_once __DIR__ . '/vendor/autoload.php'; // Autoload files using Composer autoload

use Network\Linux;
use Network\Network;



echo Network::ping('196.25.1.1') . "\n";

echo Network::traceroute('192.168.243.254') . "\n";

$config = \Helpers\Helpers::Config('ssh');
$host = new Linux($config['host'], $config['username'], $config['password']);

echo $host->memory();
die(1);

var_dump ($host->dns());;
echo $host->version() . "\n";
echo $host->uptime() . "\n";
echo $host->ping() . "\n";
