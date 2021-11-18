<?php

namespace Xbugszone\Cryptotools\Brokers;

use Xbugszone\Cryptotools\Interfaces\BrokerInterface;

/**
 * This Simulator needs a broker in order to work
 * To get the max of the simulation this simulator go get real data from a chosen exchange.
 * The queries will be real data and the actions (getBalance, createOrder, getOpenOrders, etc) will be simulated
 */
class Simulator extends Broker implements BrokerInterface
{
    /**
     * The broker to get real data
     * @var Broker
     */
    protected Broker $broker;

    /**
     * Balance when starting the simulator
     * @var array
     */
    protected array $balance;

    /**
     * The exchange Broker
     * @param Broker $broker
     */
    public function setBroker(Broker $broker) {
        $this->broker = $broker;
    }

    public function getBalance(): array
    {
        return $this->balance;
    }

    public function getMarkets(): array
    {
        return $this->broker->getMarkets();
    }

    public function getTicker($pair): array
    {
        return $this->broker->getTicker($pair);
    }

    public function getTickers($pair, $timeframe, $since, $limit): array
    {
        return $this->broker->getTickers($pair, $timeframe, $since, $limit);
    }

    public function getOpenOrders() : array
    {
        // TODO: Implement getOpenOrders() method.
        return [];
    }

    public function createOrder($pair, $type, $side, $amount, $price)
    {
        // TODO: Implement createOrder() method.
    }
}
