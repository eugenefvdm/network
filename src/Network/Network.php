<?php

namespace Network;

class Network
{

    public static function ping($ip, $count = 1)
    {
        $output = shell_exec("ping -c$count $ip");
        preg_match('/time\=([0-9\.]+) ms/', $output, $matches);
        $result = (isset($matches[1]) ? $matches[1] : false);
        return $result;
    }

    public static function test()
    {
        echo self::ping('196.25.1.1');
    }

}