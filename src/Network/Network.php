<?php

namespace Network;

class Network
{

    public static function ping($ip_address, $count = 1)
    {
        $output = shell_exec("ping -c$count $ip_address");
        preg_match('/time\=([0-9\.]+) ms/', $output, $matches);
        $result = (isset($matches[1]) ? $matches[1] : false);
        return $result;
    }

    public static function traceroute($ip_address, $flags = '-n') {
        $output = shell_exec("traceroute $flags $ip_address 2>&1");
        return $output;
    }

}