<?php

namespace App\Entity;

use App\Repository\AutoritesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AutoritesRepository::class)
 */
class Autorites
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
    private $codeAutorite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typeAutorite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numImmatriculation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $formeAutoNom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $autreFormeNom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $zoneGeographique;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateCreation;



    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $histoireAutorite;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $statutJuridique;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $fonctionActivite;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $organisationInterne;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $typeRelation;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descriptionRelation;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateDebutRelation;

   

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $codeServiceDescription;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $regleConvention;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $statutAutorite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $niveauDetail;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $langueEcriture;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $noteEntretien;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $natureRelation;

    /**
     * @ORM\OneToMany(targetEntity=Producteurs::class, mappedBy="autorite")
     */
    private $producteurs;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateFinRelation;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateDestruction;

    public function __construct()
    {
        $this->producteurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeAutorite(): ?string
    {
        return $this->codeAutorite;
    }

    public function setCodeAutorite(string $codeAutorite): self
    {
        $this->codeAutorite = $codeAutorite;

        return $this;
    }

    public function getTypeAutorite(): ?string
    {
        return $this->typeAutorite;
    }

    public function setTypeAutorite(string $typeAutorite): self
    {
        $this->typeAutorite = $typeAutorite;

        return $this;
    }

    public function getNumImmatriculation(): ?string
    {
        return $this->numImmatriculation;
    }

    public function setNumImmatriculation(string $numImmatriculation): self
    {
        $this->numImmatriculation = $numImmatriculation;

        return $this;
    }

    public function getFormeAutoNom(): ?string
    {
        return $this->formeAutoNom;
    }

    public function setFormeAutoNom(string $formeAutoNom): self
    {
        $this->formeAutoNom = $formeAutoNom;

        return $this;
    }

    public function getAutreFormeNom(): ?string
    {
        return $this->autreFormeNom;
    }

    public function setAutreFormeNom(?string $autreFormeNom): self
    {
        $this->autreFormeNom = $autreFormeNom;

        return $this;
    }

    public function getZoneGeographique(): ?string
    {
        return $this->zoneGeographique;
    }

    public function setZoneGeographique(?string $zoneGeographique): self
    {
        $this->zoneGeographique = $zoneGeographique;

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


    public function getHistoireAutorite(): ?string
    {
        return $this->histoireAutorite;
    }

    public function setHistoireAutorite(?string $histoireAutorite): self
    {
        $this->histoireAutorite = $histoireAutorite;

        return $this;
    }

    public function getStatutJuridique(): ?string
    {
        return $this->statutJuridique;
    }

    public function setStatutJuridique(?string $statutJuridique): self
    {
        $this->statutJuridique = $statutJuridique;

        return $this;
    }

    public function getFonctionActivite(): ?string
    {
        return $this->fonctionActivite;
    }

    public function setFonctionActivite(?string $fonctionActivite): self
    {
        $this->fonctionActivite = $fonctionActivite;

        return $this;
    }

    public function getOrganisationInterne(): ?string
    {
        return $this->organisationInterne;
    }

    public function setOrganisationInterne(?string $organisationInterne): self
    {
        $this->organisationInterne = $organisationInterne;

        return $this;
    }

    public function getTypeRelation(): ?string
    {
        return $this->typeRelation;
    }

    public function setTypeRelation(?string $typeRelation): self
    {
        $this->typeRelation = $typeRelation;

        return $this;
    }

    public function getDescriptionRelation(): ?string
    {
        return $this->descriptionRelation;
    }

    public function setDescriptionRelation(?string $descriptionRelation): self
    {
        $this->descriptionRelation = $descriptionRelation;

        return $this;
    }

    public function getDateDebutRelation(): ?\DateTimeInterface
    {
        return $this->dateDebutRelation;
    }

    public function setDateDebutRelation(?\DateTimeInterface $dateDebutRelation): self
    {
        $this->dateDebutRelation = $dateDebutRelation;

        return $this;
    }


    public function getCodeServiceDescription(): ?string
    {
        return $this->codeServiceDescription;
    }

    public function setCodeServiceDescription(?string $codeServiceDescription): self
    {
        $this->codeServiceDescription = $codeServiceDescription;

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

    public function getStatutAutorite(): ?string
    {
        return $this->statutAutorite;
    }

    public function setStatutAutorite(?string $statutAutorite): self
    {
        $this->statutAutorite = $statutAutorite;

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

    public function getLangueEcriture(): ?string
    {
        return $this->langueEcriture;
    }

    public function setLangueEcriture(?string $langueEcriture): self
    {
        $this->langueEcriture = $langueEcriture;

        return $this;
    }

    public function getNoteEntretien(): ?string
    {
        return $this->noteEntretien;
    }

    public function setNoteEntretien(?string $noteEntretien): self
    {
        $this->noteEntretien = $noteEntretien;

        return $this;
    }

    public function getNatureRelation(): ?string
    {
        return $this->natureRelation;
    }

    public function setNatureRelation(?string $natureRelation): self
    {
        $this->natureRelation = $natureRelation;

        return $this;
    }

    /**
     * @return Collection|Producteurs[]
     */
    public function getProducteurs(): Collection
    {
        return $this->producteurs;
    }

    public function addProducteur(Producteurs $producteur): self
    {
        if (!$this->producteurs->contains($producteur)) {
            $this->producteurs[] = $producteur;
            $producteur->setAutorite($this);
        }

        return $this;
    }

    public function removeProducteur(Producteurs $producteur): self
    {
        if ($this->producteurs->removeElement($producteur)) {
            // set the owning side to null (unless already changed)
            if ($producteur->getAutorite() === $this) {
                $producteur->setAutorite(null);
            }
        }

        return $this;
    }

    public function getDateFinRelation(): ?\DateTimeInterface
    {
        return $this->dateFinRelation;
    }

    public function setDateFinRelation(?\DateTimeInterface $dateFinRelation): self
    {
        $this->dateFinRelation = $dateFinRelation;

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
}