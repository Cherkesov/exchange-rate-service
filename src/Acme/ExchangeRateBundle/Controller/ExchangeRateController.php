<?php

namespace Acme\ExchangeRateBundle\Controller;

use Acme\ExchangeRateBundle\Entity\ExchangeRate;
use Acme\ExchangeRateBundle\Service\ExchangeRate\ExchangeRateServiceFactory;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Acme\DemoBundle\Form\ContactType;

use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

// these import the "@Route" and "@Template" annotations
use FOS\RestBundle\Controller\Annotations\RouteResource;


/**
 * Class ExchangeRateController
 * @package Acme\ExchangeRateBundle\Controller
 * @RouteResource("ExchangeRate")
 */
class ExchangeRateController extends FOSRestController implements ClassResourceInterface
{
    /**
     * @Rest\View
     * @param $code
     * @return array
     */
    public function getAction($code)
    {
        $from = substr($code, 0, 3);
        $to = substr($code, 3, 3);
        $erService = ExchangeRateServiceFactory::get($this->get('service_container'));
        $rate = $erService->getExchangeRate($from, $to);
        return new ExchangeRate($from, $to, $rate);
    }
}
