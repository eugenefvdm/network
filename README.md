# network

##Description

A PHP network library that provides various common network functions.

## Installation

`composer require eugenevdm/network`

You only need the helpers if you want to store your SSH credentials separately.

`composer require eugenevdm/helpers`

## Commands

`echo Network::ping('196.25.1.1');`

`echo Network::traceroute('196.25.1.1');`

### SSH

#### SSH Installation

`sudo apt-get install php-ssh2 && sudo /etc/init.d/apache2 restart`

#### SSH Usage

```php
$config = \Helpers\Helpers::Config('ssh');
$host = new Linux($config['host'], $config['username'], $config['password']);
var_dump ($host->dns());;
echo $host->version() . "\n";
echo $host->uptime() . "\n";
echo $host->ping() . "\n";
```