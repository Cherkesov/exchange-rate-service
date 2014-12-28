<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 26.12.2014
 * Time: 3:02
 */

namespace Acme\ExchangeRateBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class ExchangeRate
 * @package Acme\ExchangeRateBundle\Entity
 */
class ExchangeRate
{
    /**
     * @var string
     */
    protected $from;

    /**
     * @var string
     */
    protected $to;

    /**
     * @var float
     */
    protected $rate;

    /**
     * Default constructor
     * @param string $from
     * @param string $to
     * @param int $rate
     */
    public function __construct($from = '', $to = '', $rate = 0)
    {
        $this->from = $from;
        $this->to = $to;
        $this->rate = $rate;
    }

    /**
     * @return string
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param string $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }

    /**
     * @return string
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param string $to
     */
    public function setTo($to)
    {
        $this->to = $to;
    }

    /**
     * @return float
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @param float $rate
     */
    public function setRate($rate)
    {
        $this->rate = $rate;
    }
}