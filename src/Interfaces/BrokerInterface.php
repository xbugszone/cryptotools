<?php

namespace Xbugszone\Cryptotools\Interfaces;

interface BrokerInterface
{
    public function getBalance() : array;
    public function getMarkets() : array;
    public function getTicker(string $pair) : array;
    public function getTickers(string $pair, string $timeframe,string $since,int $limit) : array;
    public function getOpenOrders() : array;
    public function createOrder(string $pair, string $type, string $side, float $amount, float $price ): bool;

}
