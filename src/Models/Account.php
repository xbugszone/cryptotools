<?php

namespace Xbugszone\Cryptotools\Models;

use Xbugszone\Cryptotools\Brokers\Broker;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    /**
     * Stores the balances of this account
     * @var array
     */
    protected array $balance;

    /**
     * Stores the trades of this account
     * @var array
     */
    protected array $trades;

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    /**
     * Get the needed info from the broker related to my account
     * @param Broker $broker
     */
    public function createAccount(Broker $broker) : Account
    {
        $balance = $broker->getBalance();
        $this->balance = $balance;
        return $this;
    }
}
