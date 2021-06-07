<?php

namespace App\Entity;

use App\Repository\ArchivesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArchivesRepository::class)
 */
class Archives
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
    private $numOrdre;

    /**
     * @ORM\ManyToOne(targetEntity=Producteurs::class, inversedBy="archives")
     * @ORM\JoinColumn(nullable=false)
     */
    private $codeProducteur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $typologieDocumentaire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $statutArchive;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $paraphe;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cote;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateurs::class, inversedBy="archives")
     */
    private $nomResponsable;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbreExemplaire;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateDisposition;

    /**
     * @ORM\OneToMany(targetEntity=Transferts::class, mappedBy="codeArchive")
     */
    private $beneficiaires;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numInventaire;

    public function __construct()
    {
        $this->beneficiaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumOrdre(): ?string
    {
        return $this->numOrdre;
    }

    public function setNumOrdre(string $numOrdre): self
    {
        $this->numOrdre = $numOrdre;

        return $this;
    }

    public function getCodeProducteur(): ?Producteurs
    {
        return $this->codeProducteur;
    }

    public function setCodeProducteur(?Producteurs $codeProducteur): self
    {
        $this->codeProducteur = $codeProducteur;

        return $this;
    }

    public function getTypologieDocumentaire(): ?string
    {
        return $this->typologieDocumentaire;
    }

    public function setTypologieDocumentaire(?string $typologieDocumentaire): self
    {
        $this->typologieDocumentaire = $typologieDocumentaire;

        return $this;
    }

    public function getStatutArchive(): ?string
    {
        return $this->statutArchive;
    }

    public function setStatutArchive(?string $statutArchive): self
    {
        $this->statutArchive = $statutArchive;

        return $this;
    }

    public function getParaphe(): ?string
    {
        return $this->paraphe;
    }

    public function setParaphe(?string $paraphe): self
    {
        $this->paraphe = $paraphe;

        return $this;
    }

    public function getCote(): ?string
    {
        return $this->cote;
    }

    public function setCote(?string $cote): self
    {
        $this->cote = $cote;

        return $this;
    }

    public function getNomResponsable(): ?Utilisateurs
    {
        return $this->nomResponsable;
    }

    public function setNomResponsable(?Utilisateurs $nomResponsable): self
    {
        $this->nomResponsable = $nomResponsable;

        return $this;
    }

    public function getNbreExemplaire(): ?int
    {
        return $this->nbreExemplaire;
    }

    public function setNbreExemplaire(?int $nbreExemplaire): self
    {
        $this->nbreExemplaire = $nbreExemplaire;

        return $this;
    }

    public function getDateDisposition(): ?\DateTimeInterface
    {
        return $this->dateDisposition;
    }

    public function setDateDisposition(?\DateTimeInterface $dateDisposition): self
    {
        $this->dateDisposition = $dateDisposition;

        return $this;
    }

    /**
     * @return Collection|Transferts[]
     */
    public function getBeneficiaires(): Collection
    {
        return $this->beneficiaires;
    }

    public function addBeneficiaire(Transferts $beneficiaire): self
    {
        if (!$this->beneficiaires->contains($beneficiaire)) {
            $this->beneficiaires[] = $beneficiaire;
            $beneficiaire->setCodeArchive($this);
        }

        return $this;
    }

    public function removeBeneficiaire(Transferts $beneficiaire): self
    {
        if ($this->beneficiaires->removeElement($beneficiaire)) {
            // set the owning side to null (unless already changed)
            if ($beneficiaire->getCodeArchive() === $this) {
                $beneficiaire->setCodeArchive(null);
            }
        }

        return $this;
    }

    public function getNumInventaire(): ?string
    {
        return $this->numInventaire;
    }

    public function setNumInventaire(string $numInventaire): self
    {
        $this->numInventaire = $numInventaire;

        return $this;
    }
}