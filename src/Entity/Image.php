<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Asserts;

#[ORM\Entity(repositoryClass: ImageRepository::class)]
class Image
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $filename = null;

    private $tempFilename;

    #[Asserts\Image()]
    #[Asserts\NotBlank()]
    private $file;

    private $webView;

    #[ORM\ManyToMany(targetEntity: User::class)]
    private Collection $test;

    public function __construct()
    {
        $this->test = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(?string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }

    public function getFile(): ?File
    {
        return $this->file;
    }

    public function setFile(File $file = null): self
    {
        $this->file = $file;

        return $this;
    }

    public function getTempFilename(): ?string
    {
        return $this->tempFilename;
    }

    public function setTempFilename($filename): self
    {
        $this->tempFilename = $filename;

        return $this;
    }

    public function getWebView(): string
    {
        return $this->webView;
    }

    public function setWebView(string $webView): self
    {
        $this->webView = $webView;

        return $this;
    }

    public function __toString()
    {
        return $this->getFilename();
    }

    /**
     * @return Collection<int, User>
     */
    public function getTest(): Collection
    {
        return $this->test;
    }

    public function addTest(User $test): self
    {
        if (!$this->test->contains($test)) {
            $this->test->add($test);
        }

        return $this;
    }

    public function removeTest(User $test): self
    {
        $this->test->removeElement($test);

        return $this;
    }
}
