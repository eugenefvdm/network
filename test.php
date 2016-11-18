<?php

require_once __DIR__ . '/vendor/autoload.php'; // Autoload files using Composer autoload

use Network\Network;
use Network\Ssh;

echo Network::traceroute('192.168.243.254');

echo Network::ping('196.25.1.1'); // Test ping

$config = \Helpers\Helpers::Config('ssh');
$host = new Ssh($config['host'], $config['username'], $config['password']);
$host->os();
$host->uptime();
