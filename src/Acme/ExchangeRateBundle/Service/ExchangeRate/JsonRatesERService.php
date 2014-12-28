<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 26.12.2014
 * Time: 23:07
 */

namespace Acme\ExchangeRateBundle\Service\ExchangeRate;

use DOMDocument;

class JsonRatesERService extends AbstractExchangeRateService
{
    /**
     * @return string
     */
    public function getServiceDomain()
    {
        return 'http://jsonrates.com/get/?from=USD&to=EUR';
    }

    /**
     * @return string
     */
    public function getServiceDescription()
    {
        return '';
    }

    /**
     * @param string $from
     * @param string $to
     * @return float
     */
    public function getExchangeRate($from, $to)
    {
        $data = file_get_contents('http://jsonrates.com/get/?from=' . $from . '&to=' . $to);
        $json = json_decode($data);
        return (float) $json->rate;
    }
}