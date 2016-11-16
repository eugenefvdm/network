<?php

namespace Network;

class Ssh
{

    function __construct($host, $username, $password, $port = 22)
    {

        $connection = ssh2_connect($host, 22);
        ssh2_auth_password($connection, $username, $password);

        $stream = ssh2_exec($connection, '/usr/local/bin/php -i');

//        $methods = array(
//            'kex' => 'diffie-hellman-group1-sha1',
//            'client_to_server' => array(
//                'crypt' => '3des-cbc',
//                'comp' => 'none'),
//            'server_to_client' => array(
//                'crypt' => 'aes256-cbc,aes192-cbc,aes128-cbc',
//                'comp' => 'none'));
//
//        $callbacks = array('disconnect' => 'my_ssh_disconnect');
//
//        $connection = ssh2_connect($host, $port, $methods, $callbacks);
//        if (!$connection) die('Connection failed');
    }


}

function my_ssh_disconnect($reason, $message, $language) {
    printf("Server disconnected with reason code [%d] and message: %s\n",
        $reason, $message);
}

//$methods = array(
//    'kex' => 'diffie-hellman-group1-sha1',
//    'client_to_server' => array(
//        'crypt' => '3des-cbc',
//        'comp' => 'none'),
//    'server_to_client' => array(
//        'crypt' => 'aes256-cbc,aes192-cbc,aes128-cbc',
//        'comp' => 'none'));
//
//$callbacks = array('disconnect' => 'my_ssh_disconnect');
//
//$connection = ssh2_connect('shell.example.com', 22, $methods, $callbacks);
//if (!$connection) die('Connection failed');