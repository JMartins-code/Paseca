<?php

namespace App\Entity;

use App\Repository\DescriptionsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DescriptionsRepository::class)
 */
class Descriptions
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
    private $codeDescription;

    /**
     * @ORM\OneToOne(targetEntity=Transferts::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $codeArchive;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etatMateriel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $natureArchive;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeDescription(): ?string
    {
        return $this->codeDescription;
    }

    public function setCodeDescription(string $codeDescription): self
    {
        $this->codeDescription = $codeDescription;

        return $this;
    }

    public function getCodeArchive(): ?Transferts
    {
        return $this->codeArchive;
    }

    public function setCodeArchive(Transferts $codeArchive): self
    {
        $this->codeArchive = $codeArchive;

        return $this;
    }

    public function getEtatMateriel(): ?string
    {
        return $this->etatMateriel;
    }

    public function setEtatMateriel(string $etatMateriel): self
    {
        $this->etatMateriel = $etatMateriel;

        return $this;
    }

    public function getNatureArchive(): ?string
    {
        return $this->natureArchive;
    }

    public function setNatureArchive(string $natureArchive): self
    {
        $this->natureArchive = $natureArchive;

        return $this;
    }
}
