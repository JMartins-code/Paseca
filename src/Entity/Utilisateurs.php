<?php

namespace App\Entity;

use App\Repository\UtilisateursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UtilisateursRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class Utilisateurs implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date")
     */
    private $dateNaissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lieuNaissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numTelephone;

    /**
     * @ORM\OneToMany(targetEntity=Archives::class, mappedBy="nomResponsable")
     */
    private $archives;

    /**
     * @ORM\OneToOne(targetEntity=Producteurs::class, mappedBy="codeUtilisateur", cascade={"persist", "remove"})
     */
    private $producteurs;

    /**
     * @ORM\OneToOne(targetEntity=Controlleurs::class, mappedBy="codeUtilisateur", cascade={"persist", "remove"})
     */
    private $controlleurs;

    /**
     * @ORM\OneToOne(targetEntity=Archivistes::class, mappedBy="codeUtilisateur", cascade={"persist", "remove"})
     */
    private $archivistes;

    public function __construct()
    {
        $this->archives = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getLieuNaissance(): ?string
    {
        return $this->lieuNaissance;
    }

    public function setLieuNaissance(?string $lieuNaissance): self
    {
        $this->lieuNaissance = $lieuNaissance;

        return $this;
    }

    public function getNumTelephone(): ?string
    {
        return $this->numTelephone;
    }

    public function setNumTelephone(?string $numTelephone): self
    {
        $this->numTelephone = $numTelephone;

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
            $archive->setNomResponsable($this);
        }

        return $this;
    }

    public function removeArchive(Archives $archive): self
    {
        if ($this->archives->removeElement($archive)) {
            // set the owning side to null (unless already changed)
            if ($archive->getNomResponsable() === $this) {
                $archive->setNomResponsable(null);
            }
        }

        return $this;
    }

    public function getProducteurs(): ?Producteurs
    {
        return $this->producteurs;
    }

    public function setProducteurs(Producteurs $producteurs): self
    {
        $this->producteurs = $producteurs;

        // set the owning side of the relation if necessary
        if ($producteurs->getCodeUtilisateur() !== $this) {
            $producteurs->setCodeUtilisateur($this);
        }

        return $this;
    }

    public function getControlleurs(): ?Controlleurs
    {
        return $this->controlleurs;
    }

    public function setControlleurs(Controlleurs $controlleurs): self
    {
        $this->controlleurs = $controlleurs;

        // set the owning side of the relation if necessary
        if ($controlleurs->getCodeUtilisateur() !== $this) {
            $controlleurs->setCodeUtilisateur($this);
        }

        return $this;
    }

    public function getArchivistes(): ?Archivistes
    {
        return $this->archivistes;
    }

    public function setArchivistes(Archivistes $archivistes): self
    {
        $this->archivistes = $archivistes;

        // set the owning side of the relation if necessary
        if ($archivistes->getCodeUtilisateur() !== $this) {
            $archivistes->setCodeUtilisateur($this);
        }

        return $this;
    }
}
