<?php

namespace Pizza\shopBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * ZipcodeList
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Pizza\shopBundle\Entity\ZipcodeListRepository")
 */
class ZipcodeList
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
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;


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
     * Set city
     *
     * @param string $city
     * @return ZipcodeList
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="zipcodelist", cascade={"persist"})
     */
    protected $users;
    
    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    //public function __toString()
    //{
    //    return strval($this->id);
    //}

}
