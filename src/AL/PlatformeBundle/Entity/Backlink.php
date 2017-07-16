<?php

namespace AL\PlatformeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * BacklinkEntity
 * Un backlink est une page (url) sur laquelle se situe une ancre et un lien ahref vers une Target.
 * Chaque backlink a une target et plusieurs backlinks peuvent avoir la même target
 * @ORM\Table(name="backlink")
 * @ORM\Entity(repositoryClass="AL\PlatformeBundle\Repository\BacklinkRepository")
 */
class Backlink
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
     * @var Target
     *
     * @ORM\ManyToOne (targetEntity="Target", inversedBy="backlinks", cascade={"persist"})
     * @ORM\JoinColumn(name="target_id", referencedColumnName="id")
     */
    private $target;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="anchor", type="string", length=255, nullable=true)
     */
    private $anchor;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=3, nullable=true)
     */
    private $price;

    /**
     * @var Deal
     *
     * @ORM\ManyToOne (targetEntity="Deal", inversedBy="backlinks")
     * @ORM\JoinColumn(name="deal_id", referencedColumnName="id")
     */
    private $deal;


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
     * Set url
     *
     * @param string $url
     *
     * @return string
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
     * Set anchor
     *
     * @param string $anchor
     *
     * @return Backlink
     */
    public function setAnchor($anchor)
    {
        $this->anchor = $anchor;

        return $this;
    }

    /**
     * Get anchor
     *
     * @return string
     */
    public function getAnchor()
    {
        return $this->anchor;
    }

    /**
     * Set target
     *
     * @param Target
     *
     * @return Backlink
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
     * Get seller
     *
     * @return Seller
     */

    public function getSeller()
    {
        return $this->getDeal()->getSeller();
    }


  /**
   * Get deal
   *
   * @return Deal
   */

    public function getDeal()
    {
        return $this->deal;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return BacklinkEntity
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
