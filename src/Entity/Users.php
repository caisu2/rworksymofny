<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
class Users
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $username = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $google_id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $rapid_identity_id = null;

    #[ORM\Column]
    private ?int $user_type_id = null;

    #[ORM\Column(length: 255)]
    private ?string $app_access = null;

    #[ORM\Column]
    private ?int $deleted = null;

    #[ORM\Column]
    private ?int $active = null;

    #[ORM\Column(length: 255)]
    private ?string $sec_key = null;

    #[ORM\Column(length: 255)]
    private ?string $trp_user_ref_key = null;

    #[ORM\Column]
    private ?int $created_by_id = null;

    #[ORM\Column(length: 255)]
    private ?string $created_on = null;

    #[ORM\Column(nullable: true)]
    private ?int $fs_user_id = null;

    #[ORM\Column]
    private ?int $is_from_ldap = null;

    #[ORM\Column]
    private ?int $is_wo_search_within_filters_selected = null;

    #[ORM\Column]
    private ?int $is_eq_search_within_filters_selected = null;

    #[ORM\Column(nullable: true)]
    private ?int $sort_by = null;

    #[ORM\Column(nullable: true)]
    private ?int $sort_type = null;

    #[ORM\Column(nullable: true)]
    private ?int $is_sort_set_default = null;

    #[ORM\Column(length: 255)]
    private ?string $date_range_filter = null;

    #[ORM\Column(length: 255)]
    private ?string $ldap_dn = null;

    #[ORM\Column(length: 255)]
    private ?string $updated_on = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getGoogleId(): ?string
    {
        return $this->google_id;
    }

    public function setGoogleId(?string $google_id): self
    {
        $this->google_id = $google_id;

        return $this;
    }

    public function getRapidIdentityId(): ?string
    {
        return $this->rapid_identity_id;
    }

    public function setRapidIdentityId(?string $rapid_identity_id): self
    {
        $this->rapid_identity_id = $rapid_identity_id;

        return $this;
    }

    public function getUserTypeId(): ?int
    {
        return $this->user_type_id;
    }

    public function setUserTypeId(int $user_type_id): self
    {
        $this->user_type_id = $user_type_id;

        return $this;
    }

    public function getAppAccess(): ?string
    {
        return $this->app_access;
    }

    public function setAppAccess(string $app_access): self
    {
        $this->app_access = $app_access;

        return $this;
    }

    public function getDeleted(): ?int
    {
        return $this->deleted;
    }

    public function setDeleted(int $deleted): self
    {
        $this->deleted = $deleted;

        return $this;
    }

    public function getActive(): ?int
    {
        return $this->active;
    }

    public function setActive(int $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getSecKey(): ?string
    {
        return $this->sec_key;
    }

    public function setSecKey(string $sec_key): self
    {
        $this->sec_key = $sec_key;

        return $this;
    }

    public function getTrpUserRefKey(): ?string
    {
        return $this->trp_user_ref_key;
    }

    public function setTrpUserRefKey(string $trp_user_ref_key): self
    {
        $this->trp_user_ref_key = $trp_user_ref_key;

        return $this;
    }

    public function getCreatedById(): ?int
    {
        return $this->created_by_id;
    }

    public function setCreatedById(int $created_by_id): self
    {
        $this->created_by_id = $created_by_id;

        return $this;
    }

    public function getCreatedOn(): ?string
    {
        return $this->created_on;
    }

    public function setCreatedOn(string $created_on): self
    {
        $this->created_on = $created_on;

        return $this;
    }

    public function getFsUserId(): ?int
    {
        return $this->fs_user_id;
    }

    public function setFsUserId(?int $fs_user_id): self
    {
        $this->fs_user_id = $fs_user_id;

        return $this;
    }

    public function getIsFromLdap(): ?int
    {
        return $this->is_from_ldap;
    }

    public function setIsFromLdap(int $is_from_ldap): self
    {
        $this->is_from_ldap = $is_from_ldap;

        return $this;
    }

    public function getIsWoSearchWithinFiltersSelected(): ?int
    {
        return $this->is_wo_search_within_filters_selected;
    }

    public function setIsWoSearchWithinFiltersSelected(int $is_wo_search_within_filters_selected): self
    {
        $this->is_wo_search_within_filters_selected = $is_wo_search_within_filters_selected;

        return $this;
    }

    public function getIsEqSearchWithinFiltersSelected(): ?int
    {
        return $this->is_eq_search_within_filters_selected;
    }

    public function setIsEqSearchWithinFiltersSelected(int $is_eq_search_within_filters_selected): self
    {
        $this->is_eq_search_within_filters_selected = $is_eq_search_within_filters_selected;

        return $this;
    }

    public function getSortBy(): ?int
    {
        return $this->sort_by;
    }

    public function setSortBy(?int $sort_by): self
    {
        $this->sort_by = $sort_by;

        return $this;
    }

    public function getSortType(): ?int
    {
        return $this->sort_type;
    }

    public function setSortType(?int $sort_type): self
    {
        $this->sort_type = $sort_type;

        return $this;
    }

    public function getIsSortSetDefault(): ?int
    {
        return $this->is_sort_set_default;
    }

    public function setIsSortSetDefault(?int $is_sort_set_default): self
    {
        $this->is_sort_set_default = $is_sort_set_default;

        return $this;
    }

    public function getDateRangeFilter(): ?string
    {
        return $this->date_range_filter;
    }

    public function setDateRangeFilter(string $date_range_filter): self
    {
        $this->date_range_filter = $date_range_filter;

        return $this;
    }

    public function getLdapDn(): ?string
    {
        return $this->ldap_dn;
    }

    public function setLdapDn(string $ldap_dn): self
    {
        $this->ldap_dn = $ldap_dn;

        return $this;
    }

    public function getUpdatedOn(): ?string
    {
        return $this->updated_on;
    }

    public function setUpdatedOn(string $updated_on): self
    {
        $this->updated_on = $updated_on;

        return $this;
    }
}
