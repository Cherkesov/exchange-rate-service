<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 26.12.2014
 * Time: 22:58
 */

namespace Acme\ExchangeRateBundle\Service\ExchangeRate;


abstract class AbstractExchangeRateService
{
    /**
     * Link to exchange rates data provider
     * @return string
     */
    public abstract function getServiceUrlExample();

    /**
     * Exchange rates data provider description
     * @return string
     */
    public abstract function getServiceDescription();

    /**
     * Return exchange rate between currencies
     * @param string $from
     * @param string $to
     * @return float
     */
    public abstract function getExchangeRate($from, $to);
}