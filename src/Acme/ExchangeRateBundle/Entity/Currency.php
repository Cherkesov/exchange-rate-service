<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 26.12.2014
 * Time: 3:02
 */

namespace Acme\ExchangeRateBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Currency
 * @package Acme\ExchangeRateBundle\Entity
 * @ORM\Entity(
 *  repositoryClass="Acme\ExchangeRateBundle\Repo\CurrencyRepo"
 * )
 * @ORM\Table(
 *  name="currency",
 *  uniqueConstraints={
 *      @ORM\UniqueConstraint(name="code_idx", columns={"code"})
 *  }
 * )
 */
class Currency
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @ORM\Column(type="string", length=3)
     */
    protected $code;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $active;

    /**
     * @param string $title
     * @param string $code
     * @param boolean $active
     */
    public function __construct($title = '', $code = '', $active = false)
    {
        $this->title = $title;
        $this->code = $code;
        $this->active = $active;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->getTitle() . ' [' . $this->getCode() . ']';
    }
}