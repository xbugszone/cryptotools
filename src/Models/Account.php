<?php

namespace Xbugszone\Cryptotools\Models;


use Xbugszone\Cryptotools\Brokers\Broker;

class Account
{
    /**
     * Array with coins and values
     * @var array
     */
    protected array $balance;

    /**
     * Array with market pairs available on exchange
     * @var array
     */
    protected array $markets;

    /**
     * Array of open orders for this account
     * @var array
     */
    protected array $openOrders;

    /**
     * Populate the Account with data from the exchange
     * @param Broker $broker
     */
    public function fetchData(Broker $broker) {
        $this->balance = $broker->getBalance();
        $this->markets = $broker->getMarkets();
        $this->openOrders = $broker->getOpenOrders();
    }
}
