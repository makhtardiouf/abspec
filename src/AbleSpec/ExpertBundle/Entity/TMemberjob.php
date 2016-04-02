<?php

namespace AbleSpec\ExpertBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TMemberjob
 *
 * @ORM\Table(name="t_memberjob")
 * @ORM\Entity
 */
class TMemberjob
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idKey", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idkey;

    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=50, nullable=false)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="jobcode", type="string", length=5, nullable=false)
     */
    private $jobcode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="regdate", type="datetime", nullable=false)
     */
    private $regdate;



    /**
     * Get idkey
     *
     * @return integer
     */
    public function getIdkey()
    {
        return $this->idkey;
    }

    /**
     * Set id
     *
     * @param string $id
     *
     * @return TMemberjob
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

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
     * Set jobcode
     *
     * @param string $jobcode
     *
     * @return TMemberjob
     */
    public function setJobcode($jobcode)
    {
        $this->jobcode = $jobcode;

        return $this;
    }

    /**
     * Get jobcode
     *
     * @return string
     */
    public function getJobcode()
    {
        return $this->jobcode;
    }

    /**
     * Set regdate
     *
     * @param \DateTime $regdate
     *
     * @return TMemberjob
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
}
