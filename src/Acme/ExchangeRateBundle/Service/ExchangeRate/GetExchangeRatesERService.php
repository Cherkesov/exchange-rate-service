<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 26.12.2014
 * Time: 23:07
 */

namespace Acme\ExchangeRateBundle\Service\ExchangeRate;

use DOMDocument;

class GetExchangeRatesERService extends AbstractExchangeRateService
{
    /**
     * @return string
     */
    public function getServiceUrlExample()
    {
        return '';
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
        /*$data = file_get_contents('http://www.getexchangerates.com/api/latest.json');
        $json = json_decode($data);
        return (float) $json->rate;*/
    }
}