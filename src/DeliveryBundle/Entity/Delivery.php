<?php

namespace App\DeliveryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\DeliveryBundle\Repository\DeliveryRepository")
 */
class Delivery
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $customer = [];

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $deliveryType;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $source;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $weight;

    /**
     * @ORM\Column(type="array")
     */
    private $campaign = [];

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $onBehalf;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $enterprise = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCustomer(): ?array
    {
        return $this->customer;
    }

    public function setCustomer(?array $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    public function getDeliveryType(): ?string
    {
        return $this->deliveryType;
    }

    public function setDeliveryType(?string $deliveryType): self
    {
        $this->deliveryType = $deliveryType;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(?string $source): self
    {
        $this->source = $source;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(?int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getCampaign(): ?array
    {
        return $this->campaign;
    }

    public function setCampaign(array $campaign): self
    {
        $this->campaign = $campaign;

        return $this;
    }

    public function getOnBehalf(): ?string
    {
        return $this->onBehalf;
    }

    public function setOnBehalf(?string $onBehalf): self
    {
        $this->onBehalf = $onBehalf;

        return $this;
    }

    public function getEnterprise(): ?array
    {
        return $this->enterprise;
    }

    public function setEnterprise(?array $enterprise): self
    {
        $this->enterprise = $enterprise;

        return $this;
    }
}
