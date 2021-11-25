<?php

namespace Xbugszone\Cryptotools\Brokers;

use Xbugszone\Cryptotools\Interfaces\BrokerInterface;

class CCTXBroker extends Broker
{
    /**
     * Get open orders
     * @return array
     */
    public function getOpenOrders() : array {
        return $this->broker->fetch_open_orders();
    }

    /**
     * Create the order
     * @param string $pair
     * @param string $type
     * @param string $side
     * @param float $amount
     * @param float $price
     * @return mixed
     */
    public function createOrder(string $pair, string $type, string $side, float $amount, float $price ): bool {
        return $this->broker->create_order($pair, $type, $side, $amount, $price);
    }
}
