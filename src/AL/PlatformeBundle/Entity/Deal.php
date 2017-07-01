<?php

namespace AL\PlatformeBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Deal
 *
 * @ORM\Table(name="deal")
 * @ORM\Entity(repositoryClass="AL\PlatformeBundle\Repository\DealRepository")
 */
class Deal
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255)
     * @Assert\Length(min=2)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="sellername", type="string", length=255)
     * @Assert\Length(min=2)
     */
    private $sellername;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     * @Assert\Url()
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="target", type="string", length=255)
     * @Assert\Length(max=255)
     * @Assert\Url()
     */
    private $target;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=3)
     */
    private $price;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return Deal
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set sellername
     *
     * @param string $sellername
     *
     * @return Deal
     */
    public function setSellername($sellername)
    {
        $this->sellername = $sellername;

        return $this;
    }

    /**
     * Get sellername
     *
     * @return string
     */
    public function getSellername()
    {
        return $this->sellername;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Deal
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set target
     *
     * @param string $target
     *
     * @return Deal
     */
    public function setTarget($target)
    {
        $this->target = $target;

        return $this;
    }

    /**
     * Get target
     *
     * @return string
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return Deal
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }
}
