<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 28.12.2014
 * Time: 21:02
 */

namespace Acme\ExchangeRateBundle\Repo;

use Acme\ExchangeRateBundle\Entity\Currency;
use Doctrine\ORM\EntityRepository;

class CurrencyRepo extends EntityRepository
{
    public function createDefaultData()
    {
        $data = [
            new Currency('Belarus Ruble', 'BYR', true),
            new Currency('Estonia Kroon', 'EEK', true),
            new Currency('Euro Member Countries', 'EUR', true),
            new Currency('Norway Krone', 'NOK', true),
            new Currency('Russia Ruble', 'RUB', true),
            new Currency('Sweden Krona', 'SEK', true),
            new Currency('Switzerland Franc', 'CHF', true),
            new Currency('Ukraine Hryvna', 'UAH', true),
            new Currency('United Kingdom Pound', 'GBP', true),
            new Currency('United States Dollar', 'USD', true),
        ];

        $em = $this->getEntityManager();

        foreach ($data as $item) {
            $em->persist($item);
        }
        $em->flush();
    }
}