<?php

namespace Network;

abstract class Os
{

    abstract protected function dns();

    abstract protected function ping();

    abstract protected function uptime();

    abstract protected function version();

}