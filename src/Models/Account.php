<?php

namespace Xbugszone\Cryptotools\Models;

use Xbugszone\Cryptotools\Interfaces\BrokerInterface;

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
     * @param BrokerInterface $broker
     */
    public function fetchData(BrokerInterface $broker) {
        $this->balance = $broker->getBalance();
        $this->markets = $broker->getMarkets();
        $this->openOrders = $broker->getOpenOrders();
    }

    public function getValue(string $coin) {
        return $this->balance[$coin]['free'];
    }

    public function getAvailablePairs(string $coin): array
    {
        return array_filter($this->markets, function($market) use ($coin) {
           return str_starts_with($market, $coin);
        });
    }
}
