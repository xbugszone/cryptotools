<?php

namespace Xbugszone\Cryptotools\Interfaces;

interface AccountInterface
{
    /**
     * Populate the User with data from the exchange
     * @param BrokerInterface $broker
     */
    public function fetchData(BrokerInterface $broker) : void;

    /**
     * Get the market pair available in this broker for this coin
     * @param string $coin
     * @return array
     */
    public function getAvailablePairs(string $coin): array;

    /**
     * Populate the User with data from the exchange
     * @param string $pair
     * @param string $type
     * @param string $side
     * @param float $amount
     * @param float $price
     */
    public function createOrder(string $pair, string $type, string $side, float $amount, float $price): bool;

    /**
     * The exchange Broker
     * @param BrokerInterface $broker
     */
    public function setBroker(BrokerInterface $broker): void;
}
