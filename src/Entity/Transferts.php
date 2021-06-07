<?php

namespace App\Entity;

use App\Repository\TransfertsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TransfertsRepository::class)
 */
class Transferts
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Controlleurs::class, inversedBy="transferts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $codeControlleur;

    /**
     * @ORM\ManyToOne(targetEntity=Institutions::class, inversedBy="transferts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $codeInstitution;

    /**
     * @ORM\ManyToOne(targetEntity=Archives::class, inversedBy="beneficiaires")
     */
    private $codeArchive;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numExemplaire;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbreFaitEnregistrement;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $observationsTransfert;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateOuvertureRegistre;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateFermeture;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $codePlanClasse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $codeRegleGestion;

    /**
     * @ORM\Column(type="date")
     */
    private $dateTransfert;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $responsableTransfert;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $formatArchive;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $supportArchive;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $nomOfficierSignataire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numRefTransfert;

    /**
     * @ORM\Column(type="array")
     */
    private $periodeEnregistrement = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeControlleur(): ?Controlleurs
    {
        return $this->codeControlleur;
    }

    public function setCodeControlleur(?Controlleurs $codeControlleur): self
    {
        $this->codeControlleur = $codeControlleur;

        return $this;
    }

    public function getCodeInstitution(): ?Institutions
    {
        return $this->codeInstitution;
    }

    public function setCodeInstitution(?Institutions $codeInstitution): self
    {
        $this->codeInstitution = $codeInstitution;

        return $this;
    }

    public function getCodeArchive(): ?Archives
    {
        return $this->codeArchive;
    }

    public function setCodeArchive(?Archives $codeArchive): self
    {
        $this->codeArchive = $codeArchive;

        return $this;
    }

    public function getNumExemplaire(): ?string
    {
        return $this->numExemplaire;
    }

    public function setNumExemplaire(string $numExemplaire): self
    {
        $this->numExemplaire = $numExemplaire;

        return $this;
    }

    public function getNbreFaitEnregistrement(): ?int
    {
        return $this->nbreFaitEnregistrement;
    }

    public function setNbreFaitEnregistrement(int $nbreFaitEnregistrement): self
    {
        $this->nbreFaitEnregistrement = $nbreFaitEnregistrement;

        return $this;
    }

    public function getObservationsTransfert(): ?string
    {
        return $this->observationsTransfert;
    }

    public function setObservationsTransfert(?string $observationsTransfert): self
    {
        $this->observationsTransfert = $observationsTransfert;

        return $this;
    }

    public function getDateOuvertureRegistre(): ?\DateTimeInterface
    {
        return $this->dateOuvertureRegistre;
    }

    public function setDateOuvertureRegistre(?\DateTimeInterface $dateOuvertureRegistre): self
    {
        $this->dateOuvertureRegistre = $dateOuvertureRegistre;

        return $this;
    }

    public function getDateFermeture(): ?\DateTimeInterface
    {
        return $this->dateFermeture;
    }

    public function setDateFermeture(?\DateTimeInterface $dateFermeture): self
    {
        $this->dateFermeture = $dateFermeture;

        return $this;
    }

    public function getCodePlanClasse(): ?string
    {
        return $this->codePlanClasse;
    }

    public function setCodePlanClasse(?string $codePlanClasse): self
    {
        $this->codePlanClasse = $codePlanClasse;

        return $this;
    }

    public function getCodeRegleGestion(): ?string
    {
        return $this->codeRegleGestion;
    }

    public function setCodeRegleGestion(?string $codeRegleGestion): self
    {
        $this->codeRegleGestion = $codeRegleGestion;

        return $this;
    }

    public function getDateTransfert(): ?\DateTimeInterface
    {
        return $this->dateTransfert;
    }

    public function setDateTransfert(\DateTimeInterface $dateTransfert): self
    {
        $this->dateTransfert = $dateTransfert;

        return $this;
    }

    public function getResponsableTransfert(): ?string
    {
        return $this->responsableTransfert;
    }

    public function setResponsableTransfert(string $responsableTransfert): self
    {
        $this->responsableTransfert = $responsableTransfert;

        return $this;
    }

    public function getFormatArchive(): ?string
    {
        return $this->formatArchive;
    }

    public function setFormatArchive(?string $formatArchive): self
    {
        $this->formatArchive = $formatArchive;

        return $this;
    }

    public function getSupportArchive(): ?string
    {
        return $this->supportArchive;
    }

    public function setSupportArchive(?string $supportArchive): self
    {
        $this->supportArchive = $supportArchive;

        return $this;
    }

    public function getNomOfficierSignataire(): ?string
    {
        return $this->nomOfficierSignataire;
    }

    public function setNomOfficierSignataire(?string $nomOfficierSignataire): self
    {
        $this->nomOfficierSignataire = $nomOfficierSignataire;

        return $this;
    }

    public function getNumRefTransfert(): ?string
    {
        return $this->numRefTransfert;
    }

    public function setNumRefTransfert(string $numRefTransfert): self
    {
        $this->numRefTransfert = $numRefTransfert;

        return $this;
    }

    public function getPeriodeEnregistrement(): ?array
    {
        return $this->periodeEnregistrement;
    }

    public function setPeriodeEnregistrement(array $periodeEnregistrement): self
    {
        $this->periodeEnregistrement = $periodeEnregistrement;

        return $this;
    }
}