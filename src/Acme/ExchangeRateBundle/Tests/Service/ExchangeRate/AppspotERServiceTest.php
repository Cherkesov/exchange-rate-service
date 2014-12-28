<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 28.12.2014
 * Time: 17:37
 */

namespace Acme\ExchangeRateBundle\Tests\Service\ExchangeRate;

use Acme\ExchangeRateBundle\Service\ExchangeRate\AppspotERService;

class AppspotERServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider exRateProvider
     * @param string $from
     * @param string $to
     * @param mixed $expected
     */
    public function testGetExchangeRate($from, $to, $expected)
    {
        $service = new AppspotERService();
        $actual = $service->getExchangeRate($from, $to);

        if (is_float($expected)) {
            $this->assertEquals($expected, $actual);
        } else {
            if (is_string($expected)) {
                switch ($expected) {
                    case 'gt0':
                        $this->assertTrue((0 < $actual),'');
                        break;
                }
            }
        }
    }

    public function exRateProvider()
    {
        return array(
            array('USD', 'EUR', 'gt0'),
            array('EUR', 'USD', 'gt0'),
            array('HEL', 'WRD', 0),
        );
    }
}
