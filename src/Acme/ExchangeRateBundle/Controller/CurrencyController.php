<?php

namespace Acme\ExchangeRateBundle\Controller;

use Acme\ExchangeRateBundle\Entity\Currency;
use Acme\ExchangeRateBundle\Repo\CurrencyRepo;
use FOS\RestBundle\Controller\FOSRestController;
use JMS\Serializer\SerializerBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Acme\DemoBundle\Form\ContactType;

use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations\RouteResource;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;


/**
 * Class CurrencyController
 * @package Acme\ExchangeRateBundle\Controller
 * @ RouteResource("Currency")
 */
class CurrencyController extends FOSRestController
{
    /**
     * @Rest\View
     * @return array
     */
    public function getAllAction()
    {
        $currencies = $this->getRepo()->findAll();
        if (count($currencies) ==0) {
            $this->getRepo()->createDefaultData();
        }

        $activeCurrencies = $this->getRepo()->findBy(['active' => true]);
        return $activeCurrencies;
    }

    /**
     * @Rest\View
     * @param $id
     * @return array
     */
    public function getAction($id)
    {
        $currency = $this->getRepo()->find($id);
        return $currency;
    }

    /**
     * @return CurrencyRepo
     */
    private function getRepo()
    {
        return $this->getDoctrine()
            ->getRepository('Acme\ExchangeRateBundle\Entity\Currency');
    }
}
