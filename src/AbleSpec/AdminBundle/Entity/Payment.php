<?php

namespace AbleSpec\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Payment
 *
 * @ORM\Table(name="payment")
 * @ORM\Entity
 */
class Payment
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
     * @ORM\Column(name="status", type="string", length=20, precision=0, scale=0, nullable=false, unique=false)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="amount", type="decimal", precision=0, scale=0, nullable=false, unique=false)
     */
    private $amount;

    /**
     * @var string
     *
     * @ORM\Column(name="transactionCode", type="string", length=30, precision=0, scale=0, nullable=false, unique=false)
     */
    private $transactionCode;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=200, precision=0, scale=0, nullable=false, unique=false)
     */
    private $description;

    /**
     * @var \AbleSpec\AdminBundle\Entity\Expert
     *
     * @ORM\ManyToOne(targetEntity="AbleSpec\AdminBundle\Entity\Expert", inversedBy="payment")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="expert_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $expert;



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
     * Set status
     *
     * @param string $status
     *
     * @return Payment
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set amount
     *
     * @param string $amount
     *
     * @return Payment
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set transactionCode
     *
     * @param string $transactionCode
     *
     * @return Payment
     */
    public function setTransactionCode($transactionCode)
    {
        $this->transactionCode = $transactionCode;

        return $this;
    }

    /**
     * Get transactionCode
     *
     * @return string
     */
    public function getTransactionCode()
    {
        return $this->transactionCode;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Payment
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set expert
     *
     * @param \AbleSpec\AdminBundle\Entity\Expert $expert
     *
     * @return Payment
     */
    public function setExpert(\AbleSpec\AdminBundle\Entity\Expert $expert = null)
    {
        $this->expert = $expert;

        return $this;
    }

    /**
     * Get expert
     *
     * @return \AbleSpec\AdminBundle\Entity\Expert
     */
    public function getExpert()
    {
        return $this->expert;
    }
}
