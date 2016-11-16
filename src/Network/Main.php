<?php

require_once __DIR__ . '/../../vendor/autoload.php'; // Autoload files using Composer autoload

use Network\Network;

echo Network::ping('196.25.1.1');
