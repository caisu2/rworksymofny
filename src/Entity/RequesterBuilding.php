<?php

namespace App\Entity;

use App\Repository\RequesterBuildingRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RequesterBuildingRepository::class)]
class RequesterBuilding
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $rb_requester_id = null;

    #[ORM\Column]
    private ?int $rb_building_id = null;

    #[ORM\Column]
    private ?int $rb_location_id = null;

    #[ORM\Column]
    private ?int $rb_type = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRbRequesterId(): ?int
    {
        return $this->rb_requester_id;
    }

    public function setRbRequesterId(?int $rb_requester_id): self
    {
        $this->rb_requester_id = $rb_requester_id;

        return $this;
    }

    public function getRbBuildingId(): ?int
    {
        return $this->rb_building_id;
    }

    public function setRbBuildingId(int $rb_building_id): self
    {
        $this->rb_building_id = $rb_building_id;

        return $this;
    }

    public function getRbLocationId(): ?int
    {
        return $this->rb_location_id;
    }

    public function setRbLocationId(int $rb_location_id): self
    {
        $this->rb_location_id = $rb_location_id;

        return $this;
    }

    public function getRbType(): ?int
    {
        return $this->rb_type;
    }

    public function setRbType(int $rb_type): self
    {
        $this->rb_type = $rb_type;

        return $this;
    }
}
