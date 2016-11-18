<?php

namespace Network;

class Linux extends Os
{

    private $ssh;
    private $host;

    function __construct($host, $username, $password)
    {
        $this->host = $host;
        $this->ssh = new Ssh($host, $username, $password);
    }

    public function dns()
    {
        $result =  $this->ssh->execute('cat /etc/resolv.conf');
        preg_match_all('/nameserver (\d+.\d+.\d.\d)/', $result, $matches);
        return $matches[1];
    }

    public function ping()
    {
        return Network::ping($this->host);
    }

    public function uptime()
    {
        return $this->ssh->execute('uptime');
    }

    public function version()
    {
        return $this->ssh->execute('cat /etc/issue');
    }

}