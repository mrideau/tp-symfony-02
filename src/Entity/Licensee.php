<?php

namespace App\Entity;

use App\Repository\LicenseeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LicenseeRepository::class)]
class Licensee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'licensees')]
    private ?Club $club = null;

    #[ORM\ManyToOne(inversedBy: 'licensees')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClub(): ?Club
    {
        return $this->club;
    }

    public function setClub(?Club $club): self
    {
        $this->club = $club;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function __toString(): string
    {
        return $this->getUser()->getFullname();
    }
}
