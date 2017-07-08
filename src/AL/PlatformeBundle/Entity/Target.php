<?php

namespace AL\PlatformeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Target
 * Une target est la page de destination du backlink. Une seule target peut avoir plusieurs backlinks
 * @ORM\Table(name="target")
 * @ORM\Entity(repositoryClass="AL\PlatformeBundle\Repository\TargetRepository")
 */
class Target
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
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany (targetEntity="Backlink", mappedBy="target")
     */
    private $backlinks;


    public function __construct()
    {
        $this->backlinks = new ArrayCollection();
        $this->deals = new ArrayCollection();
    }

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
     * @return Target
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

    public function setBacklinks(array $backlinks)
        {
            $this->backlinks = new ArrayCollection($backlinks);
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


    public function setDeals(array $deals)
        {
            $this->deals = new ArrayCollection($deals);
            return $this;
        }

    /**
     * Get deals
     *
     * @return array
     */

    public function getDeals()
        {
            return $this->deals;
        }

}
