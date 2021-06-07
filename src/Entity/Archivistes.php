<?php

namespace App\Entity;

use App\Repository\ArchivistesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArchivistesRepository::class)
 */
class Archivistes
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
    private $codeArchiviste;

    /**
     * @ORM\OneToOne(targetEntity=Utilisateurs::class, inversedBy="archivistes", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $codeUtilisateur;

    /**
     * @ORM\ManyToOne(targetEntity=Institutions::class, inversedBy="archivistes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $institution;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeArchiviste(): ?string
    {
        return $this->codeArchiviste;
    }

    public function setCodeArchiviste(string $codeArchiviste): self
    {
        $this->codeArchiviste = $codeArchiviste;

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

    public function getInstitution(): ?Institutions
    {
        return $this->institution;
    }

    public function setInstitution(?Institutions $institution): self
    {
        $this->institution = $institution;

        return $this;
    }
}