<?php

namespace Xbugszone\Cryptotools\Utils;

/**
 * Utils for trading
 */
class Utils
{
    /**
     * Get average
     * @param array $ticker
     * @return float
     */
    public static function getAvg(array $ticker) : float {
        return ($ticker[0]['high']+$ticker[0]['low'])/2;
    }

    /**
     * Get diff between open and close
     * @param array $ticker
     * @return float
     */
    public static function getDiff(array $ticker) : float {
        return $ticker[0]['open'] - $ticker[0]['close'];
    }

    /**
     * Get percentage of change
     * @param array $ticker
     * @return float
     */
    public static function getChange(array $ticker) : float {
        $avg = self::getAvg($ticker);
        $diff = self::getDiff($ticker);
        return $diff/($avg/100);
    }
}
