<?php

namespace Xbugszone\Cryptotools\Utils\Structs;

class Order
{
    public $id;
    public $clientOrderId;
    public $datetime;
    public $timestamp;
    public $lastTradeTimestamp;
    public $status;
    public $symbol;
    public $type;
    public $timeInForce;
    public $postOnly;
    public $side;
    public $price;
    public $stopPrice;
    public $cost;
    public $amount;
    public $filled;
    public $remaining;
    public $trades;
    public $fee;
    public $info;
    public $average;
    public $fees;
    public function __construct(array $params) {
        $this->id = null;
        $this->clientOrderId = null;
        $this->datetime = null;
        $this->timestamp = null;
        $this->lastTradeTimestamp = null;
        $this->status = null;
        $this->symbol = null;
        $this->type = null;
        $this->timeInForce = null;
        $this->postOnly = null;
        $this->side = null;
        $this->price = null;
        $this->stopPrice = null;
        $this->cost = null;
        $this->amount = null;
        $this->filled = null;
        $this->remaining = null;
        $this->trades = null;
        $this->fee = null;
        $this->info = null;
        $this->average = null;
        $this->fees = null;

        foreach ($params as $key =>$value) {
            $this->$key = $value;
        }

        $this->info = new \stdClass();
        $this->info->price = $this->price;
        $this->info->currency_pair = $this->symbol;
        $this->info->datetime = $this->datetime;
        $this->info->amount = $this->amount;
        $this->info->type = $this->type;
        $this->info->id = $this->id;
    }
    public function getData() {
        return json_encode($this);
    }

}
