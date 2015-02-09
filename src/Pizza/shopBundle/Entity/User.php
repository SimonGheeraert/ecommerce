<?php

namespace Pizza\shopBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 * @UniqueEntity(fields="email", message="Email already taken")
 */

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Pizza\shopBundle\Entity\UserRepository")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\ManyToOne(targetEntity="ZipcodeList", inversedBy="users", cascade={"persist"})
     * @ORM\JoinColumn(name="addressId", referencedColumnName="id")
     **/
    private $zipcodelist;

    /**
     * @ORM\Column(type="string", length=32, nullable=true)
     */
    private $salt;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @ORM\OneToMany(targetEntity="SoldProduct", mappedBy="user", cascade={"persist"})
     */
    protected $soldproducts;


    public function __construct()
    {
        $this->soldproducts = new ArrayCollection();
        $this->isActive = true;
        $this->salt = md5(uniqid(null, true));
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
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(max = 4096)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=255)
     */
    private $street;

    /**
     * @var integer
     *
     * @ORM\Column(name="number", type="integer")
     */
    private $number;

    /**
     * @var integer
     *
     * @ORM\Column(name="addressId", type="integer")
     */
    private $addressId;

    /**
     * @var integer
     *
     * @ORM\Column(name="telId", type="integer")
     */
    private $telId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="addedOn", type="datetime", nullable=true)
     */
    //private $addedOn;


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
     * Set email
     *
     * @param string $email
     * @return User
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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Get salt
     */
    public function getSalt()
    {
        //return $this->salt;
        return null;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set street
     *
     * @param string $street
     * @return User
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string 
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set number
     *
     * @param integer $number
     * @return User
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set addressId
     *
     * @param integer $addressId
     * @return User
     */
    public function setAddressId($addressId)
    {
        $this->addressId = $addressId;

        return $this;
    }

    /**
     * Get addressId
     *
     * @return integer 
     */
    public function getAddressId()
    {
        return $this->addressId;
    }

    /**
     * Set telId
     *
     * @param integer $telId
     * @return User
     */
    public function setTelId($telId)
    {
        $this->telId = $telId;

        return $this;
    }

    /**
     * Get telId
     *
     * @return integer 
     */
    public function getTelId()
    {
        return $this->telId;
    }

    /**
     * Set addedOn
     *
     * @param \DateTime $addedOn
     * @return User
     */
    public function setAddedOn($addedOn)
    {
        $this->addedOn = $addedOn;

        return $this;
    }

    /**
     * Get addedOn
     *
     * @return \DateTime 
     */
    public function getAddedOn()
    {
        return $this->addedOn;
    }


    /**
     * Set salt
     *
     * @param string $salt
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set zipcodelist
     *
     * @param \Pizza\shopBundle\Entity\ZipcodeList $zipcodelist
     * @return User
     */
    public function setZipcodelist(\Pizza\shopBundle\Entity\ZipcodeList $zipcodelist = null)
    {
        $this->zipcodelist = $zipcodelist;

        return $this;
    }

    /**
     * Get zipcodelist
     *
     * @return \Pizza\shopBundle\Entity\ZipcodeList 
     */
    public function getZipcodelist()
    {
        return $this->zipcodelist;
    }

    /**
     * Add soldproducts
     *
     * @param \Pizza\shopBundle\Entity\SoldProduct $soldproducts
     * @return User
     */
    public function addSoldproduct(\Pizza\shopBundle\Entity\SoldProduct $soldproducts)
    {
        $this->soldproducts[] = $soldproducts;

        return $this;
    }

    /**
      * Remove soldproducts
      *
      * @param \Pizza\shopBundle\Entity\SoldProduct $soldproducts
      */
    public function removeSoldproduct(\Pizza\shopBundle\Entity\SoldProduct $soldproducts)
    {
        $this->soldproducts->removeElement($soldproducts);
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return array('ROLE_USER');
    }
    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
    }
    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
    )); 
    }

    /**
    * @see \Serializable::unserialize()
    */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
            ) = unserialize($serialized);
    }

    /**
     * Get soldproducts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSoldproducts()
    {
        return $this->soldproducts;
    }

    /**
     * @ORM\OneToOne(targetEntity="TelList", mappedBy="User", cascade={"persist"})
     * @ORM\JoinColumn(name="telId", referencedColumnName="id")
     */
    protected $tellist;

    /**
     * Set tellist
     *
     * @param \Pizza\shopBundle\Entity\TelList $tellist
     * @return User
     */
    public function setTellist(\Pizza\shopBundle\Entity\TelList $tellist = null)
    {
        $this->tellist = $tellist;

        return $this;
    }

    /**
     * Get tellist
     *
     * @return \Pizza\shopBundle\Entity\TelList 
     */
    public function getTellist()
    {
        return $this->tellist;
    }
}
