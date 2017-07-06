<?php

namespace AL\PlatformeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Backlink
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
     * @ORM\ManyToOne (targetEntity="Target", inversedBy="backlinks")
     * @ORM\JoinColumn(name="target_id", referencedColumnName="id")
     */
    private $target;

    /**
     * @var Deal
     *
     * Each backlink has one deal, but one deal can have many backlinks.
     * @ORM\ManyToOne (targetEntity="Deal", inversedBy="backlinks")
     * @ORM\JoinColumn(name="deal_id", referencedColumnName="id")
     */
    private $deal;

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
     * @var Seller
     *
     * @ORM\ManyToOne (targetEntity="Seller", inversedBy="backlinks")
     * @ORM\JoinColumn(name="seller_id", referencedColumnName="id")
     */
    private $seller;



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
     * @return Backlink
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
     * @param string $target
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
     * Set seller
     *
     * @param string $seller
     *
     * @return Backlink
     */
    public function setSeller($seller)
    {
        $this->target = $seller;

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
     * Set deal
     *
     * @param string $deal
     *
     * @return Backlink
     */

    public function setDeal($deal)
    {
        $this->deal = $deal;
        return $this;
    }

  /**
   * Get deal
   *
   * @return string
   */

    public function getDeal()
    {
        return $this->deal;
    }

}
