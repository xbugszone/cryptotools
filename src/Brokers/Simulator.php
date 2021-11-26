<?php

namespace Xbugszone\Cryptotools\Brokers;

use Xbugszone\Cryptotools\Interfaces\BrokerInterface;
use Xbugszone\Cryptotools\Traits\Broker;

/**
 * This Simulator needs a broker in order to work
 * To get the max of the simulation this simulator go get real data from a chosen exchange.
 * The queries will be real data and the actions (getBalance, createOrder, getOpenOrders, etc) will be simulated
 */
class Simulator implements BrokerInterface
{
    use Broker;

    public function getOpenOrders() : array
    {
        // TODO: Implement getOpenOrders() method.
        return [];
    }

    public function createOrder(string $pair, string $type, string $side, float $amount, float $price ): bool
    {
        // TODO: Implement createOrder() method.
        return true;
    }
}
