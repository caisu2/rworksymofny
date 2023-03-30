<?php

namespace App\Entity;

use App\Repository\RequestersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RequestersRepository::class)]
class Requesters
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $req_first_name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $req_middle_name = null;

    #[ORM\Column(length: 255)]
    private ?string $req_last_name = null;

    #[ORM\Column]
    private ?int $req_user_id = null;

    #[ORM\Column]
    private ?int $req_app_access = null;

    #[ORM\Column]
    private ?int $req_deleted = null;

    #[ORM\Column(length: 255)]
    private ?string $req_updated_on = null;

    #[ORM\Column]
    private ?int $req_updated_by_id = null;

    #[ORM\Column]
    private ?int $req_has_only_one_building = null;

    #[ORM\Column]
    private ?int $req_is_approved = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReqFirstName(): ?string
    {
        return $this->req_first_name;
    }

    public function setReqFirstName(string $req_first_name): self
    {
        $this->req_first_name = $req_first_name;

        return $this;
    }

    public function getReqMiddleName(): ?string
    {
        return $this->req_middle_name;
    }

    public function setReqMiddleName(?string $req_middle_name): self
    {
        $this->req_middle_name = $req_middle_name;

        return $this;
    }

    public function getReqLastName(): ?string
    {
        return $this->req_last_name;
    }

    public function setReqLastName(string $req_last_name): self
    {
        $this->req_last_name = $req_last_name;

        return $this;
    }

    public function getReqUserId(): ?int
    {
        return $this->req_user_id;
    }

    public function setReqUserId(int $req_user_id): self
    {
        $this->req_user_id = $req_user_id;

        return $this;
    }

    public function getReqAppAccess(): ?int
    {
        return $this->req_app_access;
    }

    public function setReqAppAccess(int $req_app_access): self
    {
        $this->req_app_access = $req_app_access;

        return $this;
    }

    public function getReqDeleted(): ?int
    {
        return $this->req_deleted;
    }

    public function setReqDeleted(int $req_deleted): self
    {
        $this->req_deleted = $req_deleted;

        return $this;
    }

    public function getReqUpdatedOn(): ?string
    {
        return $this->req_updated_on;
    }

    public function setReqUpdatedOn(string $req_updated_on): self
    {
        $this->req_updated_on = $req_updated_on;

        return $this;
    }

    public function getReqUpdatedById(): ?int
    {
        return $this->req_updated_by_id;
    }

    public function setReqUpdatedById(int $req_updated_by_id): self
    {
        $this->req_updated_by_id = $req_updated_by_id;

        return $this;
    }

    public function getReqHasOnlyOneBuilding(): ?int
    {
        return $this->req_has_only_one_building;
    }

    public function setReqHasOnlyOneBuilding(int $req_has_only_one_building): self
    {
        $this->req_has_only_one_building = $req_has_only_one_building;

        return $this;
    }

    public function getReqIsApproved(): ?int
    {
        return $this->req_is_approved;
    }

    public function setReqIsApproved(int $req_is_approved): self
    {
        $this->req_is_approved = $req_is_approved;

        return $this;
    }
}
