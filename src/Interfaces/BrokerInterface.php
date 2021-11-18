<?php

namespace Xbugszone\Cryptotools\Interfaces;

interface BrokerInterface
{
    public function getBalance() : array;
    public function getMarkets() : array;
    public function getTicker($pair) : array;
    public function getTickers($pair,$timeframe,$since,$limit) : array;
    public function getOpenOrders() : array;
    public function createOrder($pair, $type, $side, $amount, $price );

}
