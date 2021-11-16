<?php

namespace Xbugszone\Cryptotools\Brokers;

use Xbugszone\Cryptotools\Utils\Structs\Ticker;
use ccxt\bitstamp as ccxtBitstamp;
use Xbugszone\Cryptotools\Interfaces\BrokerInterface;

class Bitstamp extends Broker implements BrokerInterface
{
    /**
     * @var ccxtBitstamp
     */
    private $exchange;

    /**
     * @throws \ccxt\ExchangeError
     */
    public function __construct()
    {
        $this->exchange = new ccxtBitstamp(array(
            'apiKey' => env("BITSTAMP_API_KEY"),
            'secret' => env('BITSTAMP_API_SECRET'),
        ));
    }

    /**
     * Get the account balance from the broker
     * Array(..., [BTC] => Array ([total] => 0.00343618, [free] => 0.00343618, [used] => 0, ...)
     */
    public function getBalance() : array {
        $balance = $this->exchange->fetch_balance();
        $accountBalance = [];
        foreach ($balance['total'] as $coinName => $coinValue ) {
            if($coinValue != 0) {
                $accountBalance[$coinName]['total'] = $coinValue;
                $accountBalance[$coinName]['free'] = $balance['free'][$coinName];
                $accountBalance[$coinName]['used'] = $balance['used'][$coinName];

            }
        }
        return $accountBalance;
    }

    /**
     * @param $symbol
     * @return array
     */
    public function getTicker($pair) {
        return $this->exchange->fetch_ticker($pair);
    }
    public function getOpenOrders() {
        return $this->exchange->fetch_open_orders();
    }

    public function createOrder($pair, $type, $side, $amount, $price ) {
        //print_r($this->exchange->sell($crypto['coin'], 'trade', 'sell', $crypto['value'], $ticker['last']));
        return $this->exchange->create_order($pair, $type, $side, $amount, $price);
    }
    public function getTickers($pair,$timeframe,$since,$limit)
    {
        $ohlcvs = $this->exchange->fetch_ohlcv($pair, $timeframe, $since, $limit);
        $candles = [];
        foreach ($ohlcvs as $ohlcv) {
            $ticker = new Ticker([
                "symbol" => $pair,
                "timestamp" => $ohlcv[0],
                "open" => $ohlcv[1],
                "high" => $ohlcv[2],
                "low" => $ohlcv[3],
                "close" => $ohlcv[4],
            ]);
            $candles[] = json_decode($ticker->getData(),true);
        }
        return $candles;
    }

}
