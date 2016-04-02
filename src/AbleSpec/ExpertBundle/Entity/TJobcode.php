<?php

namespace AbleSpec\ExpertBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TJobcode
 *
 * @ORM\Table(name="t_jobcode")
 * @ORM\Entity
 */
class TJobcode
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="jobcode", type="string", length=5, nullable=false)
     */
    private $jobcode;

    /**
     * @var string
     *
     * @ORM\Column(name="jobname", type="string", length=50, nullable=false)
     */
    private $jobname;



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
     * Set jobcode
     *
     * @param string $jobcode
     *
     * @return TJobcode
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
     * Set jobname
     *
     * @param string $jobname
     *
     * @return TJobcode
     */
    public function setJobname($jobname)
    {
        $this->jobname = $jobname;

        return $this;
    }

    /**
     * Get jobname
     *
     * @return string
     */
    public function getJobname()
    {
        return $this->jobname;
    }
}
