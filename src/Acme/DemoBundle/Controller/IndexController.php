<?php

namespace Acme\DemoBundle\Controller;

use Acme\ExchangeRateBundle\Service\ExchangeRate\ExchangeRateServiceFactory;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\DemoBundle\Form\ContactType;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class IndexController extends Controller
{
    /**
     * @Route("/", name="index")
     * @Template()
     */
    public function indexAction()
    {
        $erService = ExchangeRateServiceFactory::get($this->get('service_container'));
        return array('er_service' => $erService);
    }
}
