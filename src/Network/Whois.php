<?php

namespace Network;

use DateTime;
use Helpers\Helpers;

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
        $this->domain = $domain;
        $output = shell_exec("whois $domain");
        // Check if .co.uk and if so use ExtractUkWhoisInformation
        if (strpos($domain, '.co.uk')) {
            $this->ExtractUkWhoisInformation($output);
        } else {
            $lines  = explode("\n", $output);
            $this->ExtractWhoisInformation($lines);
        }
    }

    private function ExtractUkWhoisInformation($output) {

        preg_match('/Registrar:\n\s+(.+)/', $output, $matches);
        $this->registrar = $matches[1];

        preg_match('/Registrant:\n\s+(.+)/', $output, $matches);
        $this->registrant = $matches[1];

        preg_match('/Expiry date:  (.+)/', $output, $matches);
        $this->expires_at = Helpers::date_normalize($matches[1]);

        preg_match_all('/Name servers:\n\s+(.+)\n\s+(.+)\n\s+(.+)/', $output, $matches);
        unset($matches[0]);
        $name_servers=[];
        foreach ($matches as $match) {
            $name_servers[] = $match[0];
        }
        $this->name_servers = $name_servers;

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
                        $this->name_servers[] = trim(strtolower($value)); // Append name servers
                        break;
                    case 'Registrant Name' :
                        $this->registrant = trim($value);
                        break;
                    case 'Registry Expiry Date' :
                        $this->expires_at = Helpers::date_normalize($value);
                        break;
                    case 'Registrar Registration Expiration Date' :
                        $this->expires_at = Helpers::date_normalize($value);
                        break;
                    case 'Domain Expiration Date' :
                        $this->expires_at = Helpers::date_normalize($value);
                        break;
                    case 'Registrar' :
                        $this->registrar = trim($value);
                        break;
                    case 'Sponsoring Registrar' :
                        $this->registrar = trim($value);
                        break;
                }
                $result[$key] = $value;
            }
        }
    }

}
