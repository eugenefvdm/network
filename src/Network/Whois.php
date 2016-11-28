<?php

namespace Network;

class Whois
{

    public $domain;
    public $expires_at;
    public $name_servers;
    public $registrar;
    public $registrant;

    /**
     *
     * Whois constructor. Read raw WHOIS information and create object variables
     *
     * @param $domain
     */
    function __construct($domain)
    {
        $output = shell_exec("whois $domain");
        $lines  = explode("\n", $output);
        $this->ExtractWhoisInformation($lines);
    }

    /**
     *
     * Scroll through all lines in the WHOIS result and assign relevant values to this object
     *
     * @param $lines
     */
    private function ExtractWhoisInformation($lines)
    {
        $result = [];
        //
        foreach ($lines as $line) {
            $pos = strpos($line, ':');
            if ($pos !== false) {
                $key   = substr($line, 0, $pos);
                $value = substr($line, $pos + 2);
                switch ($key) {
                    case 'Name Server' :
                        $this->appendNameServer($value);
                        break;
                    case 'Domain Name' :
                        $this->domain = $value;
                        break;
                    case 'Registrant Name' :
                        $this->registrant = $value;
                        break;
                    case 'Registry Expiry Date' :
                        $this->expires_at = $value;
                        break;
                    case 'Sponsoring Registrar' :
                        $this->registrar = $value;
                        break;
                }
                $result[$key] = $value;
            }
        }
    }

    private function appendNameServer($value)
    {
        $this->name_servers[] = $value;
    }

}
