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
     * @return string
     */
    public abstract function getServiceDomain();

    /**
     * @return string
     */
    public abstract function getServiceDescription();

    /**
     * @param string $from
     * @param string $to
     * @return float
     */
    public abstract function getExchangeRate($from, $to);
}