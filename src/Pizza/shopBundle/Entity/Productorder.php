<?php

namespace Pizza\shopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Productorder
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Pizza\shopBundle\Entity\ProductorderRepository")
 */
class Productorder
{
    /**
     * @ORM\OneToMany(targetEntity="SoldProduct", mappedBy="productorder")
     */
    protected $soldproducts;


    public function __construct()
    {
        $this->soldproducts = new ArrayCollection();
    }
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timeOrder", type="datetime")
     */
    private $timeOrder;

    /**
     * @var float
     *
     * @ORM\Column(name="totalPrice", type="float")
     */
    private $totalPrice;

    /**
     * @var integer
     *
     * @ORM\Column(name="userId", type="integer")
     */
    private $userId;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set timeOrder
     *
     * @param \DateTime $timeOrder
     * @return Productorder
     */
    public function setTimeOrder($timeOrder)
    {
        $this->timeOrder = $timeOrder;

        return $this;
    }

    /**
     * Get timeOrder
     *
     * @return \DateTime 
     */
    public function getTimeOrder()
    {
        return $this->timeOrder;
    }

    /**
     * Set totalPrice
     *
     * @param float $totalPrice
     * @return Productorder
     */
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }

    /**
     * Get totalPrice
     *
     * @return float 
     */
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return Productorder
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }
}
