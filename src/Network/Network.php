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

    /**
     * Traceroute
     *
     * The default flag '-n' does not resolve DNS
     *
     * @param $ip_address
     * @param string $flags
     * @return string
     */
    public static function traceroute($ip_address, $flags = '-n') {
        $output = shell_exec("traceroute $flags $ip_address 2>&1");
        return $output;
    }

}