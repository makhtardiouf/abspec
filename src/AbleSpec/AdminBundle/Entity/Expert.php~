<?php

namespace AbleSpec\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Expert
 *
 * @ORM\Table(name="expert")
 * @ORM\Entity
 */
class Expert
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, precision=0, scale=0, nullable=false, unique=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="useralias", type="string", length=10, precision=0, scale=0, nullable=false, unique=true)
     */
    private $useralias;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, precision=0, scale=0, nullable=false, unique=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=25, precision=0, scale=0, nullable=false, unique=false)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="registration_number", type="string", length=25, precision=0, scale=0, nullable=false, unique=false)
     */
    private $registrationNumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="registration_date", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $registrationDate;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AbleSpec\AdminBundle\Entity\Package")
     * @ORM\JoinTable(name="expert_package",
     *   joinColumns={
     *     @ORM\JoinColumn(name="expert_id", referencedColumnName="id", nullable=true, onDelete="CASCADE")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="package_id", referencedColumnName="id", nullable=true, onDelete="CASCADE")
     *   }
     * )
     */
    private $packages;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="webusers_id", referencedColumnName="id", unique=true, nullable=true)
     * })
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->packages = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * Set name
     *
     * @param string $name
     *
     * @return Expert
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set useralias
     *
     * @param string $useralias
     *
     * @return Expert
     */
    public function setUseralias($useralias)
    {
        $this->useralias = $useralias;

        return $this;
    }

    /**
     * Get useralias
     *
     * @return string
     */
    public function getUseralias()
    {
        return $this->useralias;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Expert
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
     * Set address
     *
     * @param string $address
     *
     * @return Expert
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Expert
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set registrationNumber
     *
     * @param string $registrationNumber
     *
     * @return Expert
     */
    public function setRegistrationNumber($registrationNumber)
    {
        $this->registrationNumber = $registrationNumber;

        return $this;
    }

    /**
     * Get registrationNumber
     *
     * @return string
     */
    public function getRegistrationNumber()
    {
        return $this->registrationNumber;
    }

    /**
     * Set registrationDate
     *
     * @param \DateTime $registrationDate
     *
     * @return Expert
     */
    public function setRegistrationDate($registrationDate)
    {
        $this->registrationDate = $registrationDate;

        return $this;
    }

    /**
     * Get registrationDate
     *
     * @return \DateTime
     */
    public function getRegistrationDate()
    {
        return $this->registrationDate;
    }

    /**
     * Add package
     *
     * @param \AbleSpec\AdminBundle\Entity\Package $package
     *
     * @return Expert
     */
    public function addPackage(\AbleSpec\AdminBundle\Entity\Package $package)
    {
        $this->packages[] = $package;

        return $this;
    }

    /**
     * Remove package
     *
     * @param \AbleSpec\AdminBundle\Entity\Package $package
     */
    public function removePackage(\AbleSpec\AdminBundle\Entity\Package $package)
    {
        $this->packages->removeElement($package);
    }

    /**
     * Get packages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPackages()
    {
        return $this->packages;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Expert
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
