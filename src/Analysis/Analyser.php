<?php

namespace Xbugszone\Cryptotools\Analysis;

class Analyser
{
    /**
     * The ticker to analyse
     * @var array Ticker
     */
    protected array $ticker;

    /**
     * The tickers to analyse
     * @var array Tickers
     */
    protected array $tickers;

    /**
     * Set Ticker
     * @param array $ticker
     */
    public function setTicker(array $ticker): void {
        $this->ticker = $ticker[0];
    }

    /**
     * Set Tickers
     * @param array $tickers
     */
    public function setTickers(array $tickers): void {
        $this->tickers = $tickers;
    }

    /**
     * Get Average
     * @return float Average
     */
    public function getAvg() : float {
        return ($this->ticker['high']+$this->ticker['low'])/2;
    }

    /**
     * Get the diference
     * @return float Difference
     */
    public function getDiff() : float {
        return $this->ticker['open'] - $this->ticker['close'];
    }

    /**
     * Get the change
     * @return float %
     */
    public function getChange() : float {
        return $this->getDiff()/($this->getAvg()/100);
    }

    /**
     * Get the direction
     * -1 down
     * 0 no direction
     * 1 up
     * @return int
     */
    public function direction() : int {
        return 0;
    }
}
