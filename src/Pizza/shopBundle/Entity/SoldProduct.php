<?php

namespace Pizza\shopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SoldProduct
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Pizza\shopBundle\Entity\SoldProductRepository")
 */
class SoldProduct
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="orderId", type="integer")
     */
    private $orderId;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;

    /**
     * @var integer
     *
     * @ORM\Column(name="productId", type="integer")
     */
    private $productId;

    /**
     * @var integer
     *
     * @ORM\Column(name="userId", type="integer")
     */
    private $userId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="anonymous", type="boolean")
     */
    private $anonymous;


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
     * Set price
     *
     * @param float $price
     * @return SoldProduct
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return SoldProduct
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set orderId
     *
     * @param integer $orderId
     * @return SoldProduct
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * Get orderId
     *
     * @return integer 
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Set productId
     *
     * @param integer $productId
     * @return SoldProduct
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * Get productId
     *
     * @return integer 
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return SoldProduct
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

    /**
     * Set anonymous
     *
     * @param boolean $anonymous
     * @return SoldProduct
     */
    public function setAnonymous($anonymous)
    {
        $this->anonymous = $anonymous;

        return $this;
    }

    /**
     * Get anonymous
     *
     * @return boolean 
     */
    public function getAnonymous()
    {
        return $this->anonymous;
    }

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="soldproducts")
     * @ORM\JoinColumn(name="userId", referencedColumnName="id")
     **/

    protected $user;

    /**
     * @ORM\ManyToOne(targetEntity="Productorder", inversedBy="soldproducts")
     * @ORM\JoinColumn(name="orderId", referencedColumnName="id")
     **/

    protected $productorder;

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="soldproducts")
     * @ORM\JoinColumn(name="productId", referencedColumnName="id")
     **/

    protected $product;
}
