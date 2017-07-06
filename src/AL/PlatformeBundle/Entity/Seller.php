<?php

namespace AL\PlatformeBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Seller
 * Le seller est le vendeur d'un deal, c'est lui qui fera le backlink vers la target. Un seller peut avoir plusieurs deals
 * @ORM\Table(name="seller")
 * @ORM\Entity(repositoryClass="AL\PlatformeBundle\Repository\SellerRepository")
 */
class Seller
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
     * @ORM\Column(name="firstname", type="string", length=255)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="company", type="string", length=255, nullable=true)
     */
    private $company;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", nullable=true)
     */
    private $comment;

    /**
     * @var Collections
     *
     * @ORM\OneToMany (targetEntity="Backlink", mappedBy ="seller")
     */
    private $backlinks;

    /**
     * @var Collections
     *
     * @ORM\OneToMany (targetEntity="Deal", mappedBy ="seller")
     */
    private $deals;

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
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Seller
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Seller
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set company
     *
     * @param string $company
     *
     * @return Seller
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Seller
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Seller
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
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
