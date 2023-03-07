<?php

namespace App\Entity;

use App\Repository\ClubRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClubRepository::class)]
class Club
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $imageUrl = null;

    #[ORM\ManyToOne(inversedBy: 'clubs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Section $section = null;

    #[ORM\OneToMany(mappedBy: 'club', targetEntity: Licensee::class)]
    private Collection $licensees;

    public function __construct()
    {
        $this->licensees = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(string $imageUrl): self
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    public function getSection(): ?Section
    {
        return $this->section;
    }

    public function setSection(?Section $section): self
    {
        $this->section = $section;

        return $this;
    }

    /**
     * @return Collection<int, Licensee>
     */
    public function getLicensees(): Collection
    {
        return $this->licensees;
    }

    public function addLicensee(Licensee $licensee): self
    {
        if (!$this->licensees->contains($licensee)) {
            $this->licensees->add($licensee);
            $licensee->setClub($this);
        }

        return $this;
    }

    public function removeLicensee(Licensee $licensee): self
    {
        if ($this->licensees->removeElement($licensee)) {
            // set the owning side to null (unless already changed)
            if ($licensee->getClub() === $this) {
                $licensee->setClub(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->getName();
    }
}
