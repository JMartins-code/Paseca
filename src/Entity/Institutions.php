<?php

namespace App\Entity;

use App\Repository\InstitutionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InstitutionsRepository::class)
 */
class Institutions
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
    private $codeInstitution;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomInstitution;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typeInstitution;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contactResponsable;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomResponsable;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $histoireInstitution;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $contextInstitution;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $textReference;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $structureInstitution;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $gestionArchive;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $batimentInstitution;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fondArchive;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $instrumentRecherche;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $heureOuverture;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $conditionAcces;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $accessibiliteInstitution;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $serviceAide;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $serveiceReproduction;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $espacePublic;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $idServiceDescription;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $regleConvention;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $niveauElaboration;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $niveauDetail;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateCreation;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateDestruction;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $langueEcriture;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sourceInstitution;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $noteMAJ;

    /**
     * @ORM\OneToMany(targetEntity=Transferts::class, mappedBy="codeInstitution")
     */
    private $transferts;

    /**
     * @ORM\OneToMany(targetEntity=Archivistes::class, mappedBy="institution")
     */
    private $archivistes;

    public function __construct()
    {
        $this->transferts = new ArrayCollection();
        $this->archivistes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeInstitution(): ?string
    {
        return $this->codeInstitution;
    }

    public function setCodeInstitution(string $codeInstitution): self
    {
        $this->codeInstitution = $codeInstitution;

        return $this;
    }

    public function getNomInstitution(): ?string
    {
        return $this->nomInstitution;
    }

    public function setNomInstitution(string $nomInstitution): self
    {
        $this->nomInstitution = $nomInstitution;

        return $this;
    }

    public function getTypeInstitution(): ?string
    {
        return $this->typeInstitution;
    }

    public function setTypeInstitution(string $typeInstitution): self
    {
        $this->typeInstitution = $typeInstitution;

        return $this;
    }

    public function getContactResponsable(): ?string
    {
        return $this->contactResponsable;
    }

    public function setContactResponsable(?string $contactResponsable): self
    {
        $this->contactResponsable = $contactResponsable;

        return $this;
    }

    public function getNomResponsable(): ?string
    {
        return $this->nomResponsable;
    }

    public function setNomResponsable(?string $nomResponsable): self
    {
        $this->nomResponsable = $nomResponsable;

        return $this;
    }

    public function getHistoireInstitution(): ?string
    {
        return $this->histoireInstitution;
    }

    public function setHistoireInstitution(?string $histoireInstitution): self
    {
        $this->histoireInstitution = $histoireInstitution;

        return $this;
    }

    public function getContextInstitution(): ?string
    {
        return $this->contextInstitution;
    }

    public function setContextInstitution(?string $contextInstitution): self
    {
        $this->contextInstitution = $contextInstitution;

        return $this;
    }

    public function getTextReference(): ?string
    {
        return $this->textReference;
    }

    public function setTextReference(?string $textReference): self
    {
        $this->textReference = $textReference;

        return $this;
    }

    public function getStructureInstitution(): ?string
    {
        return $this->structureInstitution;
    }

    public function setStructureInstitution(?string $structureInstitution): self
    {
        $this->structureInstitution = $structureInstitution;

        return $this;
    }

    public function getGestionArchive(): ?string
    {
        return $this->gestionArchive;
    }

    public function setGestionArchive(?string $gestionArchive): self
    {
        $this->gestionArchive = $gestionArchive;

        return $this;
    }

    public function getBatimentInstitution(): ?string
    {
        return $this->batimentInstitution;
    }

    public function setBatimentInstitution(?string $batimentInstitution): self
    {
        $this->batimentInstitution = $batimentInstitution;

        return $this;
    }

    public function getFondArchive(): ?string
    {
        return $this->fondArchive;
    }

    public function setFondArchive(?string $fondArchive): self
    {
        $this->fondArchive = $fondArchive;

        return $this;
    }

    public function getInstrumentRecherche(): ?string
    {
        return $this->instrumentRecherche;
    }

    public function setInstrumentRecherche(?string $instrumentRecherche): self
    {
        $this->instrumentRecherche = $instrumentRecherche;

        return $this;
    }

    public function getHeureOuverture(): ?\DateTimeInterface
    {
        return $this->heureOuverture;
    }

    public function setHeureOuverture(?\DateTimeInterface $heureOuverture): self
    {
        $this->heureOuverture = $heureOuverture;

        return $this;
    }

    public function getConditionAcces(): ?string
    {
        return $this->conditionAcces;
    }

    public function setConditionAcces(?string $conditionAcces): self
    {
        $this->conditionAcces = $conditionAcces;

        return $this;
    }

    public function getAccessibiliteInstitution(): ?string
    {
        return $this->accessibiliteInstitution;
    }

    public function setAccessibiliteInstitution(?string $accessibiliteInstitution): self
    {
        $this->accessibiliteInstitution = $accessibiliteInstitution;

        return $this;
    }

    public function getServiceAide(): ?string
    {
        return $this->serviceAide;
    }

    public function setServiceAide(?string $serviceAide): self
    {
        $this->serviceAide = $serviceAide;

        return $this;
    }

    public function getServeiceReproduction(): ?string
    {
        return $this->serveiceReproduction;
    }

    public function setServeiceReproduction(?string $serveiceReproduction): self
    {
        $this->serveiceReproduction = $serveiceReproduction;

        return $this;
    }

    public function getEspacePublic(): ?string
    {
        return $this->espacePublic;
    }

    public function setEspacePublic(?string $espacePublic): self
    {
        $this->espacePublic = $espacePublic;

        return $this;
    }

    public function getIdServiceDescription(): ?string
    {
        return $this->idServiceDescription;
    }

    public function setIdServiceDescription(?string $idServiceDescription): self
    {
        $this->idServiceDescription = $idServiceDescription;

        return $this;
    }

    public function getRegleConvention(): ?string
    {
        return $this->regleConvention;
    }

    public function setRegleConvention(?string $regleConvention): self
    {
        $this->regleConvention = $regleConvention;

        return $this;
    }

    public function getNiveauElaboration(): ?string
    {
        return $this->niveauElaboration;
    }

    public function setNiveauElaboration(?string $niveauElaboration): self
    {
        $this->niveauElaboration = $niveauElaboration;

        return $this;
    }

    public function getNiveauDetail(): ?string
    {
        return $this->niveauDetail;
    }

    public function setNiveauDetail(?string $niveauDetail): self
    {
        $this->niveauDetail = $niveauDetail;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(?\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getDateDestruction(): ?\DateTimeInterface
    {
        return $this->dateDestruction;
    }

    public function setDateDestruction(?\DateTimeInterface $dateDestruction): self
    {
        $this->dateDestruction = $dateDestruction;

        return $this;
    }

    public function getLangueEcriture(): ?string
    {
        return $this->langueEcriture;
    }

    public function setLangueEcriture(?string $langueEcriture): self
    {
        $this->langueEcriture = $langueEcriture;

        return $this;
    }

    public function getSourceInstitution(): ?string
    {
        return $this->sourceInstitution;
    }

    public function setSourceInstitution(?string $sourceInstitution): self
    {
        $this->sourceInstitution = $sourceInstitution;

        return $this;
    }

    public function getNoteMAJ(): ?string
    {
        return $this->noteMAJ;
    }

    public function setNoteMAJ(?string $noteMAJ): self
    {
        $this->noteMAJ = $noteMAJ;

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
            $transfert->setCodeInstitution($this);
        }

        return $this;
    }

    public function removeTransfert(Transferts $transfert): self
    {
        if ($this->transferts->removeElement($transfert)) {
            // set the owning side to null (unless already changed)
            if ($transfert->getCodeInstitution() === $this) {
                $transfert->setCodeInstitution(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Archivistes[]
     */
    public function getArchivistes(): Collection
    {
        return $this->archivistes;
    }

    public function addArchiviste(Archivistes $archiviste): self
    {
        if (!$this->archivistes->contains($archiviste)) {
            $this->archivistes[] = $archiviste;
            $archiviste->setInstitution($this);
        }

        return $this;
    }

    public function removeArchiviste(Archivistes $archiviste): self
    {
        if ($this->archivistes->removeElement($archiviste)) {
            // set the owning side to null (unless already changed)
            if ($archiviste->getInstitution() === $this) {
                $archiviste->setInstitution(null);
            }
        }

        return $this;
    }
}
