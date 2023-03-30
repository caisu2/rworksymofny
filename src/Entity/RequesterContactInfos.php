<?php

namespace App\Entity;

use App\Repository\RequesterContactInfosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RequesterContactInfosRepository::class)]
class RequesterContactInfos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $rci_requester_id = null;

    #[ORM\Column]
    private ?int $rci_contact_type_id = null;

    #[ORM\Column(length: 255)]
    private ?string $rci_value = null;

    #[ORM\Column(length: 255)]
    private ?string $rci_purpose = null;

    #[ORM\Column]
    private ?int $rci_primary_contact = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRciRequesterId(): ?int
    {
        return $this->rci_requester_id;
    }

    public function setRciRequesterId(int $rci_requester_id): self
    {
        $this->rci_requester_id = $rci_requester_id;

        return $this;
    }

    public function getRciContactTypeId(): ?int
    {
        return $this->rci_contact_type_id;
    }

    public function setRciContactTypeId(int $rci_contact_type_id): self
    {
        $this->rci_contact_type_id = $rci_contact_type_id;

        return $this;
    }

    public function getRciValue(): ?string
    {
        return $this->rci_value;
    }

    public function setRciValue(string $rci_value): self
    {
        $this->rci_value = $rci_value;

        return $this;
    }

    public function getRciPurpose(): ?string
    {
        return $this->rci_purpose;
    }

    public function setRciPurpose(?string $rci_purpose): self
    {
        $this->rci_purpose = $rci_purpose;

        return $this;
    }

    public function getRciPrimaryContact(): ?int
    {
        return $this->rci_primary_contact;
    }

    public function setRciPrimaryContact(int $rci_primary_contact): self
    {
        $this->rci_primary_contact = $rci_primary_contact;

        return $this;
    }
}
