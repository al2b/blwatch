<?php

namespace AL\PlatformeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Target
 * Une target est la page de destination du lien sur le backlink. Une target peut avoir plusieurs backlinks
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
     * @var Collections
     *
     * @ORM\OneToMany (targetEntity="Backlink", mappedBy="target")
     */
    private $backlinks;

    /**
     * @var Collections
     *
     * @ORM\OneToMany (targetEntity="Deal", mappedBy ="target")
     */
    private $deals;

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
    
    /**
     * Set backlinks
     *
     * @param Collections $backlinks
     *
     * @return string
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

    /**
     * Set deals
     *
     * @param Collections $deals
     *
     * @return string
     */
    public function setDeals($deals)
    {
        $this->deals = new ArrayCollection();

        return $this;
    }

    /**
     * Get deals
     *
     * @return string
     */
    public function getDeals()
    {
        return $this->deals;
    }
}
