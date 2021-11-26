<?php

namespace Xbugszone\Cryptotools\Traits;

use ccxt\bitstamp;

trait Broker
{
    /**
     * Var that bridge the brokers with the ccxt exchanges
     * @var mixed
     */
    protected mixed $broker;

    public function __construct(string $exchange, string $apiKey, string $apiSecret)
    {
        $this->broker = new $exchange(array(
            'apiKey' => $apiKey,
            'secret' => $apiSecret,
        ));
    }
    /**
     * @return array
     */
    public function getMarkets() : array {
        $marketsApi = $this->broker->fetch_markets();
        $listMarkets = [];
        foreach ($marketsApi as $market) {
            $listMarkets[] = $market['symbol'];
        }
        return $listMarkets;
    }


    /**
     * Get the account balance from the broker
     * Array(..., [BTC] => Array ([total] => 0.00343618, [free] => 0.00343618, [used] => 0, ...)
     */
    public function getBalance() : array {
        $balance = $this->broker->fetch_balance();
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
     * Get ticker
     * @param string $pair
     * @return array
     */
    public function getTicker(string $pair) : array {
        return $this->broker->fetch_ticker($pair);
    }

    /**
     * Get the tickers
     * @param string $pair
     * @param string $timeframe
     * @param string $since
     * @param int $limit
     * @return array
     */
    public function getTickers(string $pair,string $timeframe,string|null $since, int $limit) : array
    {
        $ohlcvs = $this->broker->fetch_ohlcv($pair, $timeframe, $since, $limit);
        $candles = [];
        foreach ($ohlcvs as $ohlcv) {
            $ticker = [
                "symbol" => $pair,
                "timestamp" => $ohlcv[0],
                "open" => $ohlcv[1],
                "high" => $ohlcv[2],
                "low" => $ohlcv[3],
                "close" => $ohlcv[4],
                'volume' => $ohlcv[5],
            ];
            $candles[] = $ticker;
        }
        return $candles;
    }
}
