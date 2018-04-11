<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Index;

/**
 * MobileCall
 *
 * @ORM\Table(name="mobile_call")
 * @ORM\Table(indexes={@ORM\Index(name="connection_type_idx", columns={"connection_type"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MobileCallRepository")
 *
 */
class MobileCall
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="account", type="string", length=8)
     */
    private $account;

    /**
     * @var string
     *
     * @ORM\Column(name="invoice", type="string", length=8)
     */
    private $invoice;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=8)
     */
    private $reference;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="date")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at_time", type="time")
     */
    private $createdAtTime;

    /**
     * @var string
     *
     * @ORM\Column(name="duration_volume", type="string", length=10, nullable=true)
     */
    private $durationVolume;

    /**
     * @var string
     *
     * @ORM\Column(name="invoiced_duration_volume", type="string", length=10, nullable=true)
     */
    private $invoicedDurationVolume;

    /**
     * @var string
     *
     * @ORM\Column(name="connection_type", type="string", length=255)
     */
    private $connectionType;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set account
     *
     * @param string $account
     *
     * @return MobileCall
     */
    public function setAccount($account)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * Get account
     *
     * @return string
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Set invoice
     *
     * @param string $invoice
     *
     * @return MobileCall
     */
    public function setInvoice($invoice)
    {
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * Get invoice
     *
     * @return string
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * Set reference
     *
     * @param string $reference
     *
     * @return MobileCall
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return MobileCall
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set createdAtTime
     *
     * @param \DateTime $createdAtTime
     *
     * @return MobileCall
     */
    public function setCreatedAtTime($createdAtTime)
    {
        $this->createdAtTime = $createdAtTime;

        return $this;
    }

    /**
     * Get createdAtTime
     *
     * @return \DateTime
     */
    public function getCreatedAtTime()
    {
        return $this->createdAtTime;
    }

    /**
     * Set durationVolume
     *
     * @param string $durationVolume
     *
     * @return MobileCall
     */
    public function setDurationVolume($durationVolume)
    {
        $this->durationVolume = $durationVolume;

        return $this;
    }

    /**
     * Get durationVolume
     *
     * @return string
     */
    public function getDurationVolume()
    {
        return $this->durationVolume;
    }

    /**
     * Set invoicedDurationVolume
     *
     * @param string $invoicedDurationVolume
     *
     * @return MobileCall
     */
    public function setInvoicedDurationVolume($invoicedDurationVolume)
    {
        $this->invoicedDurationVolume = $invoicedDurationVolume;

        return $this;
    }

    /**
     * Get invoicedDurationVolume
     *
     * @return string
     */
    public function getInvoicedDurationVolume()
    {
        return $this->invoicedDurationVolume;
    }

    /**
     * Set connectionType
     *
     * @param string $connectionType
     *
     * @return MobileCall
     */
    public function setConnectionType($connectionType)
    {
        $this->connectionType = $connectionType;

        return $this;
    }

    /**
     * Get connectionType
     *
     * @return string
     */
    public function getConnectionType()
    {
        return $this->connectionType;
    }
}
