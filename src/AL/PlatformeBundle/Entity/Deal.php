<?php

namespace AL\PlatformeBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Deal
 * Un deal est un accord passé entre un user et un seller. Il comporte un ou plusieurs liens, avec un prix ou non
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
    * @var User
    *
    * @ORM\ManyToOne(targetEntity="User", inversedBy="deals")
    * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
    */
    private $user;

    /**
    * @var Seller
    *
    * @ORM\ManyToOne(targetEntity="Seller", inversedBy="deals")
    * @ORM\JoinColumn(name="seller_id", referencedColumnName="id")
    */
    private $seller;

    /**
     * @var Collections
     *
     * @ORM\OneToMany (targetEntity="Backlink", mappedBy ="deal")
     */
    private $backlinks;

    /**
     * @var string
     *
     * @ORM\ManyToOne (targetEntity="Target", inversedBy="deals")
     * @ORM\JoinColumn(name="target_id", referencedColumnName="id")
     */
    private $target;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=3)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="date", type="string", length=255)
     */
    private $date;


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
     * Set user
     *
     * @param string $user
     *
     * @return Deal
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set seller
     *
     * @param string $seller
     *
     * @return Deal
     */
    public function setSeller($seller)
    {
        $this->seller = $seller;

        return $this;
    }

    /**
     * Get seller
     *
     * @return string
     */
    public function getSeller()
    {
        return $this->seller;
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

    /**
     * Set backlinks
     *
     * @param Collections $backlinks
     *
     * @return Deal
     */
    public function setBacklinks($backlinks)
    {
        $this->backlinks = new ArrayCollection();

        return $this;
    }

    /**
     * Get backlinks
     *
     * @return string
     */
    public function getBacklinks()
    {
        return $this->backlinks;
    }
}
