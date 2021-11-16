<?php

namespace Xbugszone\Cryptotools\Utils\Structs;


class Ticker
{
    public $symbol;
    public $timestamp;
    public $datetime;
    public $high;
    public $low;
    public $bid;
    public $bidVolume;
    public $ask;
    public $askVolume;
    public $vwap;
    public $open;
    public $close;
    public $last;
    public $previousClose;
    public $change;
    public $percentage;
    public $average;
    public $baseVolume;
    public $quoteVolume;
    public $info;

    public function __construct(array $params) {
        $this->symbol= null;
        $this->timestamp= null;
        $this->datetime= null;
        $this->high= null;
        $this->low= null;
        $this->bid= null;
        $this->bidVolume= null;
        $this->ask= null;
        $this->askVolume= null;
        $this->vwap= null;
        $this->open= null;
        $this->close= null;
        $this->last= null;
        $this->previousClose= null;
        $this->change= null;
        $this->percentage= null;
        $this->average= null;
        $this->baseVolume= null;
        $this->quoteVolume= null;

        foreach ($params as $key =>$value) {
            $this->$key = $value;
        }
        $this->info = new \stdClass();
        $this->info->high= $this->high;
        $this->info->last= $this->last;
        $this->info->timestamp= $this->timestamp;
        $this->info->bid= $this->bid;
        $this->info->vwap= $this->vwap;
        $this->info->volume= $this->baseVolume;
        $this->info->low= $this->low;
        $this->info->ask= $this->ask;
        $this->info->open = $this->open;
    }
    public function getData() {
        return json_encode($this);
    }
}
