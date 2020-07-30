<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $matricule;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateembauche;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $responsable;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $titulaire;

    /**
     * @ORM\Column(type="binary", nullable=true)
     */
    private $photo;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $idniveau;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $idcategorie;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $statut;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $active;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
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

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(?string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getDateembauche(): ?\DateTimeInterface
    {
        return $this->dateembauche;
    }

    public function setDateembauche(?\DateTimeInterface $dateembauche): self
    {
        $this->dateembauche = $dateembauche;

        return $this;
    }

    public function getResponsable(): ?bool
    {
        return $this->responsable;
    }

    public function setResponsable(?bool $responsable): self
    {
        $this->responsable = $responsable;

        return $this;
    }

    public function getTitulaire(): ?bool
    {
        return $this->titulaire;
    }

    public function setTitulaire(?bool $titulaire): self
    {
        $this->titulaire = $titulaire;

        return $this;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getIdniveau(): ?int
    {
        return $this->idniveau;
    }

    public function setIdniveau(?int $idniveau): self
    {
        $this->idniveau = $idniveau;

        return $this;
    }

    public function getIdcategorie(): ?int
    {
        return $this->idcategorie;
    }

    public function setIdcategorie(?int $idcategorie): self
    {
        $this->idcategorie = $idcategorie;

        return $this;
    }

    public function getStatut(): ?int
    {
        return $this->statut;
    }

    public function setStatut(?int $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): self
    {
        $this->active = $active;

        return $this;
    }
}
