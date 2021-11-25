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
     * The main coin used for transactions (USD,BTC,EUR)
     * @var string
     */
    public string $tradeCoin;

    /**
     * The broker to get real data
     * @var BrokerInterface
     */
    protected BrokerInterface $broker;

    /**
     * Populate the Account with data from the exchange
     * @param BrokerInterface $broker
     */
    public function fetchData(BrokerInterface $broker) : void {
        $this->balance = $broker->getBalance();
        $this->markets = $broker->getMarkets();
        $this->openOrders = $broker->getOpenOrders();
    }

    /**
     * Get the market pair available in this broker for this coin
     * @param string $coin
     * @return array
     */
    public function getAvailablePairs(string $coin): array
    {
        return array_filter($this->markets, function($market) use ($coin) {
           return is_numeric(strpos($market, $coin));
        });
    }

    /**
     * Populate the Account with data from the exchange
     * @param string $pair
     * @param string $type
     * @param string $side
     * @param float $amount
     * @param float $price
     */
    public function createOrder(string $pair, string $type, string $side, float $amount, float $price): void
    {
        //TODO: check if i have the money to create the order
        $this->broker->createOrder($pair, $type, $side, $amount, $price);
        //TODO: update the balance
    }

    /**
     * The exchange Broker
     * @param BrokerInterface $broker
     */
    public function setBroker(BrokerInterface $broker) {
        $this->broker = $broker;
    }
}
