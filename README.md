# network

Description

A PHP network library that has various common network functions.

Requires

You only need the helpers if you want to store your SSH credentials separately.

`composer require eugenevdm/helpers`

Commands

`echo Network::ping('196.25.1.1');`

`Network::traceroute('196.25.1.1');`

SSH

Installation

`sudo apt-get install php-ssh2 && sudo /etc/init.d/apache2 restart`

Usage

```php
$config = \Helpers\Helpers::Config('ssh');
$host = new Ssh($config['host'], $config['username'], $config['password']);
$host->os();
$host->uptime();
```