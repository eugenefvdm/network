<?php

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use Network\Network;
use Network\Ssh;

Network::test(); // Test ping

$config = \Helpers\Helpers::Config('ssh');

$host = new Ssh($config['host'], $config['username'], $config['password']);
$host->os();
$host->uptime();
