<?php

namespace App\Entity;

use App\Repository\ProducteursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProducteursRepository::class)
 */
class Producteurs
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $codeProducteurs;

    /**
     * @ORM\OneToMany(targetEntity=Archives::class, mappedBy="codeProducteur")
     */
    private $archives;

    /**
     * @ORM\OneToOne(targetEntity=Utilisateurs::class, inversedBy="producteurs", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $codeUtilisateur;

    /**
     * @ORM\ManyToOne(targetEntity=Autorites::class, inversedBy="producteurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $autorite;

    public function __construct()
    {
        $this->archives = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeProducteurs(): ?string
    {
        return $this->codeProducteurs;
    }

    public function setCodeProducteurs(string $codeProducteurs): self
    {
        $this->codeProducteurs = $codeProducteurs;

        return $this;
    }

    public function getCodeUtilisateur(): ?Utilisateurs
    {
        return $this->codeUtilisateur;
    }

    public function setCodeUtilisateur(Utilisateurs $codeUtilisateur): self
    {
        $this->codeUtilisateur = $codeUtilisateur;

        return $this;
    }

    /**
     * @return Collection|Archives[]
     */
    public function getArchives(): Collection
    {
        return $this->archives;
    }

    public function addArchive(Archives $archive): self
    {
        if (!$this->archives->contains($archive)) {
            $this->archives[] = $archive;
            $archive->setCodeProducteur($this);
        }

        return $this;
    }

    public function removeArchive(Archives $archive): self
    {
        if ($this->archives->removeElement($archive)) {
            // set the owning side to null (unless already changed)
            if ($archive->getCodeProducteur() === $this) {
                $archive->setCodeProducteur(null);
            }
        }

        return $this;
    }

    public function getAutorite(): ?Autorites
    {
        return $this->autorite;
    }

    public function setAutorite(?Autorites $autorite): self
    {
        $this->autorite = $autorite;

        return $this;
    }
}