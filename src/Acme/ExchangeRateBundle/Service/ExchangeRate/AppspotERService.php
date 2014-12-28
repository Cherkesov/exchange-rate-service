<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 26.12.2014
 * Time: 23:07
 */

namespace Acme\ExchangeRateBundle\Service\ExchangeRate;

class AppspotERService extends AbstractExchangeRateService
{
    /**
     * @return string
     */
    public function getServiceDomain()
    {
        return 'http://rate-exchange.appspot.com/currency?from=USD&to=EUR&q=1';
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
        $ch = curl_init();
        curl_setopt(
            $ch,
            CURLOPT_URL,
            'rate-exchange.appspot.com/currency?from=' . $from . '&to=' . $to . '&q=1'
        );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($output, true);
        return isset($data['rate']) ? floatval($data['rate']) : 0;
    }
}