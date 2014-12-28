<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 28.12.2014
 * Time: 7:34
 */

namespace Acme\ExchangeRateBundle\Service\ExchangeRate;

use Symfony\Component\DependencyInjection\ContainerInterface;

class ExchangeRateServiceFactory
{
    /**
     * @param ContainerInterface $serviceContainer
     * @return AbstractExchangeRateService
     * @throws \Exception
     */
    public static function get($serviceContainer)
    {
        $provider = $serviceContainer->getParameter('acme_exchange_rate.provider');
        switch ($provider) {
            case 'appspot':
                $service = new AppspotERService();
                break;
            case 'get_exchange_rate':
                $service = new GetExchangeRatesERService();
                break;
            case 'json_rates':
                $service = new JsonRatesERService();
                break;
            default:
                throw new \Exception('Exchange rates provider not found!');
                break;
        }
        return $service;
    }
}