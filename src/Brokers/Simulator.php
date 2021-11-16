<?php

namespace Xbugszone\Cryptotools\Brokers;

use Xbugszone\Cryptotools\Utils\Structs\Order;
use Illuminate\Support\Facades\Storage;
use Xbugszone\Cryptotools\Interfaces\BrokerInterface;

class Simulator extends Broker implements BrokerInterface
{
    public $tickerIdx;
    private $orders;
    public function __construct() {
        $this->tickerIdx = 0;
    }
    public function getBalance()
    {
        return json_decode(Storage::disk('simulator')->get('balance.json'));
    }

    public function getTicker($symbol)
    {
        $tickers = $this->getTickers($symbol,'1d',null,1000);
        return $tickers[$this->tickerIdx++];
    }

    public function getTickers($symbol,$timeframe,$since,$limit)
    {
        return json_decode(Storage::disk('simulator')->get('tickers'.$symbol.'_'.$timeframe.'_'.$limit.'.json'));
    }

    public function getOpenOrders()
    {
        return $this->orders;
    }

    public function createOrder($symbol, $type, $side, $amount, $price)
    {
        $order = new Order(["symbol" => $symbol, "type" => $type, "side" => $side, "amount" => $amount, "price" => $price]);
        $this->orders[] = new Order(["symbol" => $symbol, "type" => $type, "side" => $side, "amount" => $amount, "price" => $price]);
        return $order;
    }
}
