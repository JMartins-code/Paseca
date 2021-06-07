<?php

namespace App\Entity;

use App\Repository\ControlleursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ControlleursRepository::class)
 */
class Controlleurs
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $codeControlleur;

    /**
     * @ORM\OneToMany(targetEntity=Transferts::class, mappedBy="codeControlleur")
     */
    private $transferts;

    /**
     * @ORM\OneToOne(targetEntity=Utilisateurs::class, inversedBy="controlleurs", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $codeUtilisateur;

    public function __construct()
    {
        $this->transferts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeControlleur(): ?string
    {
        return $this->codeControlleur;
    }

    public function setCodeControlleur(?string $codeControlleur): self
    {
        $this->codeControlleur = $codeControlleur;

        return $this;
    }

    /**
     * @return Collection|Transferts[]
     */
    public function getTransferts(): Collection
    {
        return $this->transferts;
    }

    public function addTransfert(Transferts $transfert): self
    {
        if (!$this->transferts->contains($transfert)) {
            $this->transferts[] = $transfert;
            $transfert->setCodeControlleur($this);
        }

        return $this;
    }

    public function removeTransfert(Transferts $transfert): self
    {
        if ($this->transferts->removeElement($transfert)) {
            // set the owning side to null (unless already changed)
            if ($transfert->getCodeControlleur() === $this) {
                $transfert->setCodeControlleur(null);
            }
        }

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
}