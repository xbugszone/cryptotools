<?php

namespace Xbugszone\Cryptotools\Interfaces;

interface BrokerInterface
{
    public function getBalance();
    public function getTicker($pair);
    public function getTickers($pair,$timeframe,$since,$limit);
    public function getOpenOrders();
    public function createOrder($pair, $type, $side, $amount, $price );

}
