<?php

namespace Xbugszone\Cryptotools\Brokers;

use Xbugszone\Cryptotools\Interfaces\BrokerInterface;

class CCTXBroker implements BrokerInterface
{

    /**
     * Var that bridge the brokers with the ccxt exchanges
     * @var mixed
     */
    protected mixed $broker;

    /**
     * The exchange Class
     * To know if your exchange is supported by ccxt and how to use it
     * https://github.com/ccxt/ccxt/wiki/Exchange-Markets
     * @var string|mixed
     */
    protected string $exchange;

    /**
     * The Api Key
     * The Api Key for your exchange service
     * @var string
     */
    protected string $apiKey;

    /**
     * The Api Secret
     * The Api Secret for your exchange service
     * @var string
     */
    protected string $apiSecret;

    /**
     * @throws \Exception
     */
    public function __construct()
    {
        if (isset($this)) {
            $this->broker = new $this->exchange(array(
                'apiKey' => $this->apiKey,
                'secret' => $this->apiSecret,
            ));
        }
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
     * Get open orders
     * @return array
     */
    public function getOpenOrders() : array {
        return $this->broker->fetch_open_orders();
    }

    /**
     * Create the order
     * @param string $pair
     * @param string $type
     * @param string $side
     * @param float $amount
     * @param float $price
     * @return mixed
     */
    public function createOrder(string $pair, string $type, string $side, float $amount, float $price ) {
        return $this->broker->create_order($pair, $type, $side, $amount, $price);
    }

    /**
     * Get the tickers
     * @param string $pair
     * @param string $timeframe
     * @param string $since
     * @param int $limit
     * @return array
     */
    public function getTickers(string $pair,string $timeframe,string $since, int $limit) : array
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
