<?php

namespace AbleSpec\ExpertBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TMember
 *
 * @ORM\Table(name="t_member", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"})})
 * @ORM\Entity
 */
class TMember
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=50)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id = '';

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="member_type", type="string", length=1, nullable=true)
     */
    private $memberType;

    /**
     * @var string
     *
     * @ORM\Column(name="reg_number", type="string", length=20, nullable=true)
     */
    private $regNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="handphone", type="string", length=20, nullable=true)
     */
    private $handphone;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=20, nullable=true)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="zip1", type="string", length=3, nullable=true)
     */
    private $zip1;

    /**
     * @var string
     *
     * @ORM\Column(name="zip2", type="string", length=3, nullable=true)
     */
    private $zip2;

    /**
     * @var string
     *
     * @ORM\Column(name="addr1", type="string", length=500, nullable=true)
     */
    private $addr1;

    /**
     * @var string
     *
     * @ORM\Column(name="addr2", type="string", length=500, nullable=true)
     */
    private $addr2;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="regdate", type="datetime", nullable=true)
     */
    private $regdate;

    /**
     * @var string
     *
     * @ORM\Column(name="reg_copyfile", type="string", length=100, nullable=true)
     */
    private $regCopyfile;

    /**
     * @var string
     *
     * @ORM\Column(name="intro", type="string", length=2000, nullable=true)
     */
    private $intro;

    /**
     * @var string
     *
     * @ORM\Column(name="scholar", type="string", length=2000, nullable=true)
     */
    private $scholar;

    /**
     * @var string
     *
     * @ORM\Column(name="career", type="string", length=2000, nullable=true)
     */
    private $career;

    /**
     * @var string
     *
     * @ORM\Column(name="etc", type="string", length=2000, nullable=true)
     */
    private $etc;

    /**
     * @var string
     *
     * @ORM\Column(name="agree1", type="string", length=1, nullable=true)
     */
    private $agree1;

    /**
     * @var string
     *
     * @ORM\Column(name="agree2", type="string", length=1, nullable=true)
     */
    private $agree2;

    /**
     * @var string
     *
     * @ORM\Column(name="homepage_type", type="string", length=1, nullable=true)
     */
    private $homepageType;

    /**
     * @var string
     *
     * @ORM\Column(name="approve_home", type="string", length=1, nullable=true)
     */
    private $approveHome;



    /**
     * Get id
     *
     * @return string
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
     * @return TMember
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
     * Set memberType
     *
     * @param string $memberType
     *
     * @return TMember
     */
    public function setMemberType($memberType)
    {
        $this->memberType = $memberType;

        return $this;
    }

    /**
     * Get memberType
     *
     * @return string
     */
    public function getMemberType()
    {
        return $this->memberType;
    }

    /**
     * Set regNumber
     *
     * @param string $regNumber
     *
     * @return TMember
     */
    public function setRegNumber($regNumber)
    {
        $this->regNumber = $regNumber;

        return $this;
    }

    /**
     * Get regNumber
     *
     * @return string
     */
    public function getRegNumber()
    {
        return $this->regNumber;
    }

    /**
     * Set handphone
     *
     * @param string $handphone
     *
     * @return TMember
     */
    public function setHandphone($handphone)
    {
        $this->handphone = $handphone;

        return $this;
    }

    /**
     * Get handphone
     *
     * @return string
     */
    public function getHandphone()
    {
        return $this->handphone;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return TMember
     */
    public function setPassword($password)
    {
        $this->password = $password;

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
     * Set email
     *
     * @param string $email
     *
     * @return TMember
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
     * Set zip1
     *
     * @param string $zip1
     *
     * @return TMember
     */
    public function setZip1($zip1)
    {
        $this->zip1 = $zip1;

        return $this;
    }

    /**
     * Get zip1
     *
     * @return string
     */
    public function getZip1()
    {
        return $this->zip1;
    }

    /**
     * Set zip2
     *
     * @param string $zip2
     *
     * @return TMember
     */
    public function setZip2($zip2)
    {
        $this->zip2 = $zip2;

        return $this;
    }

    /**
     * Get zip2
     *
     * @return string
     */
    public function getZip2()
    {
        return $this->zip2;
    }

    /**
     * Set addr1
     *
     * @param string $addr1
     *
     * @return TMember
     */
    public function setAddr1($addr1)
    {
        $this->addr1 = $addr1;

        return $this;
    }

    /**
     * Get addr1
     *
     * @return string
     */
    public function getAddr1()
    {
        return $this->addr1;
    }

    /**
     * Set addr2
     *
     * @param string $addr2
     *
     * @return TMember
     */
    public function setAddr2($addr2)
    {
        $this->addr2 = $addr2;

        return $this;
    }

    /**
     * Get addr2
     *
     * @return string
     */
    public function getAddr2()
    {
        return $this->addr2;
    }

    /**
     * Set regdate
     *
     * @param \DateTime $regdate
     *
     * @return TMember
     */
    public function setRegdate($regdate)
    {
        $this->regdate = $regdate;

        return $this;
    }

    /**
     * Get regdate
     *
     * @return \DateTime
     */
    public function getRegdate()
    {
        return $this->regdate;
    }

    /**
     * Set regCopyfile
     *
     * @param string $regCopyfile
     *
     * @return TMember
     */
    public function setRegCopyfile($regCopyfile)
    {
        $this->regCopyfile = $regCopyfile;

        return $this;
    }

    /**
     * Get regCopyfile
     *
     * @return string
     */
    public function getRegCopyfile()
    {
        return $this->regCopyfile;
    }

    /**
     * Set intro
     *
     * @param string $intro
     *
     * @return TMember
     */
    public function setIntro($intro)
    {
        $this->intro = $intro;

        return $this;
    }

    /**
     * Get intro
     *
     * @return string
     */
    public function getIntro()
    {
        return $this->intro;
    }

    /**
     * Set scholar
     *
     * @param string $scholar
     *
     * @return TMember
     */
    public function setScholar($scholar)
    {
        $this->scholar = $scholar;

        return $this;
    }

    /**
     * Get scholar
     *
     * @return string
     */
    public function getScholar()
    {
        return $this->scholar;
    }

    /**
     * Set career
     *
     * @param string $career
     *
     * @return TMember
     */
    public function setCareer($career)
    {
        $this->career = $career;

        return $this;
    }

    /**
     * Get career
     *
     * @return string
     */
    public function getCareer()
    {
        return $this->career;
    }

    /**
     * Set etc
     *
     * @param string $etc
     *
     * @return TMember
     */
    public function setEtc($etc)
    {
        $this->etc = $etc;

        return $this;
    }

    /**
     * Get etc
     *
     * @return string
     */
    public function getEtc()
    {
        return $this->etc;
    }

    /**
     * Set agree1
     *
     * @param string $agree1
     *
     * @return TMember
     */
    public function setAgree1($agree1)
    {
        $this->agree1 = $agree1;

        return $this;
    }

    /**
     * Get agree1
     *
     * @return string
     */
    public function getAgree1()
    {
        return $this->agree1;
    }

    /**
     * Set agree2
     *
     * @param string $agree2
     *
     * @return TMember
     */
    public function setAgree2($agree2)
    {
        $this->agree2 = $agree2;

        return $this;
    }

    /**
     * Get agree2
     *
     * @return string
     */
    public function getAgree2()
    {
        return $this->agree2;
    }

    /**
     * Set homepageType
     *
     * @param string $homepageType
     *
     * @return TMember
     */
    public function setHomepageType($homepageType)
    {
        $this->homepageType = $homepageType;

        return $this;
    }

    /**
     * Get homepageType
     *
     * @return string
     */
    public function getHomepageType()
    {
        return $this->homepageType;
    }

    /**
     * Set approveHome
     *
     * @param string $approveHome
     *
     * @return TMember
     */
    public function setApproveHome($approveHome)
    {
        $this->approveHome = $approveHome;

        return $this;
    }

    /**
     * Get approveHome
     *
     * @return string
     */
    public function getApproveHome()
    {
        return $this->approveHome;
    }
}
