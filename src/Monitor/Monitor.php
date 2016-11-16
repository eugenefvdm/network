<?php

namespace Monitor;

class Monitor
{

    public $start;
    public $end;

    public function start()
    {
        $this->start = microtime(true);
    }

    public function show()
    {
        $this->end = microtime(true);
        echo round(microtime(true) - $this->start,3)*1000;
    }

}