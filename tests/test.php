<?php

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use Monitor\Monitor;

$monitor = new Monitor();
$monitor->start();
usleep(1000 * 100);
$monitor->show();
