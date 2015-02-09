<?php

namespace Pizza\shopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TelList
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Pizza\shopBundle\Entity\TelListRepository")
 */
class TelList
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
     * @ORM\Column(name="mobile", type="string", length=255)
     */
    private $mobile;


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
     * Set mobile
     *
     * @param string $mobile
     * @return TelList
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return string 
     */
    public function getMobile()
    {
        return $this->mobile;
    }
}
