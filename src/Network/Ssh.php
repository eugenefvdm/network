<?php

namespace Network;

class Ssh
{

    private $connection;

    function __construct($host, $username, $password, $port = 22)
    {
        $this->connection = ssh2_connect($host, 22);
        ssh2_auth_password($this->connection, $username, $password);
    }

    public function os()
    {
        $command = 'cat /etc/issue';
        $this->execute($command);
    }

    public function uptime()
    {
        $command = 'uptime';
        $this->execute($command);
    }

    /**
     * @param $command
     */
    public function execute($command)
    {
        $stream = ssh2_exec($this->connection, $command);
        stream_set_blocking($stream, true);
        $stream_out = ssh2_fetch_stream($stream, SSH2_STREAM_STDIO);
        echo stream_get_contents($stream_out);
    }

}

