<?php

namespace Xbugszone\Cryptotools;

class Manager
{
    public function getBroker($broker) {
        return new $broker;
    }
}
