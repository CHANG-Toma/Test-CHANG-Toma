<?php

namespace App\Entity;

use App\Repository\EstimateRepository;
use Doctrine\ORM\Mapping as ORM;
use DateTimeInterface;

// Modèle de données pour les devis avec tous ces champs  + accesseurs

#[ORM\Entity(repositoryClass: EstimateRepository::class)]
class Estimate
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column (type: 'integer')]
    private ?int $id = null;

    #[ORM\Column (type: 'datetime')]
    private ?DateTimeInterface $estimatedate = null;

    #[ORM\Column (type: 'string', length: 255)]
    private ?string $clientName = null;

    #[ORM\Column (type: 'string', length: 100)]
    private ?string $clientEmail = null;

    #[ORM\Column (type: 'integer', length: 50)]
    private ?int $clientPhone = null;

    #[ORM\Column (type: 'string', length: 255)]
    private ?string $clientAddress = null;

    #[ORM\Column (type: 'string', length: 100)]
    private ?string $clientCity = null;

    #[ORM\Column (type: 'string', length: 100)]
    private ?string $dresstype = null;

    #[ORM\Column (type: 'string', length: 255)]
    private ?string $customizations = null;

    #[ORM\Column (type: 'string', length: 100)]
    private ?string $fabric = null;

    #[ORM\Column (type: 'string', length: 100)]
    private ?string $fabricColor = null;

    #[ORM\Column (type: 'string', length: 100)]
    private ?string $size = null;

    #[ORM\Column (type: 'integer', length: 100)]
    private ?int $pricefabric = null;

    #[ORM\Column (type: 'integer', length: 100)]
    private ?int $quantity = null;

    #[ORM\Column (type: 'integer', length: 100)]
    private ?int $totalExTax = null;

    #[ORM\Column (type: 'integer', length: 100)]
    private ?int $tva = null;

    #[ORM\Column (type: 'integer', length: 100)]
    private ?int $totalIncTax = null;

    #[ORM\Column (type: 'string', length: 100)]
    private ?string $balandeDue = null;

    #[ORM\Column (type: 'datetime')]
    private ?DateTimeInterface $expectedDeliveryDate = null;

    #[ORM\Column (type: 'string', length: 100)]
    private ?string $deliveryMode = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEstimatedate(): ?DateTimeInterface
    {
        return $this->estimatedate;
    }

    public function setEstimatedate(DateTimeInterface $estimatedate): self
    {
        $this->estimatedate = $estimatedate;

        return $this;
    }

    public function getClientName(): ?string
    {
        return $this->clientName;
    }

    public function setClientName(string $clientName): self
    {
        $this->clientName = $clientName;

        return $this;
    }

    public function getClientEmail(): ?string
    {
        return $this->clientEmail;
    }

    public function setClientEmail(string $clientEmail): self
    {
        $this->clientEmail = $clientEmail;

        return $this;
    }

    public function getClientPhone(): ?string
    {
        return $this->clientPhone;
    }

    public function setClientPhone(int $clientPhone): self
    {
        $this->clientPhone = $clientPhone;

        return $this;
    }

    public function getClientAddress(): ?string
    {
        return $this->clientAddress;
    }

    public function setClientAddress(string $clientAddress): self
    {
        $this->clientAddress = $clientAddress;

        return $this;
    }

    public function getClientCity(): ?string
    {
        return $this->clientCity;
    }

    public function setClientCity(string $clientCity): self
    {
        $this->clientCity = $clientCity;

        return $this;
    }

    public function getDresstype(): ?string
    {
        return $this->dresstype;
    }

    public function setDresstype(string $dresstype): self
    {
        $this->dresstype = $dresstype;

        return $this;
    }

    public function getCustomizations(): ?string
    {
        return $this->customizations;
    }

    public function setCustomizations(string $customizations): self
    {
        $this->customizations = $customizations;

        return $this;
    }

    public function getFabric(): ?string
    {
        return $this->fabric;
    }

    public function setFabric(string $fabric): self
    {
        $this->fabric = $fabric;

        return $this;
    }

    public function getFabricColor(): ?string
    {
        return $this->fabricColor;
    }

    public function setFabricColor(string $fabricColor): self
    {
        $this->fabricColor = $fabricColor;

        return $this;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(string $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getPricefabric(): ?string
    {
        return $this->pricefabric;
    }

    public function setPricefabric(int $pricefabric): self
    {
        $this->pricefabric = $pricefabric;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getTotalExTax(): ?int
    {
        return $this->totalExTax;
    }

    public function setTotalExTax(int $totalExTax): self
    {
        $this->totalExTax = $totalExTax;

        return $this;
    }

    public function getTva(): ?int
    {
        return $this->tva;
    }

    public function setTva(int $tva): self
    {
        $this->tva = $tva;

        return $this;
    }

    public function getTotalIncTax(): ?int
    {
        return $this->totalIncTax;
    }

    public function setTotalIncTax(int $totalIncTax): self
    {
        $this->totalIncTax = $totalIncTax;

        return $this;
    }

    public function getBalandeDue(): ?string
    {
        return $this->balandeDue;
    }

    public function setBalandeDue(string $balandeDue): self
    {
        $this->balandeDue = $balandeDue;

        return $this;
    }

    public function getExpectedDeliveryDate(): ?DateTimeInterface
    {
        return $this->expectedDeliveryDate;
    }

    public function setExpectedDeliveryDate(DateTimeInterface $expectedDeliveryDate): self
    {
        $this->expectedDeliveryDate = $expectedDeliveryDate;

        return $this;
    }

    public function getDeliveryMode(): ?string
    {
        return $this->deliveryMode;
    }

    public function setDeliveryMode(string $deliveryMode): self
    {
        $this->deliveryMode = $deliveryMode;

        return $this;
    }
}
