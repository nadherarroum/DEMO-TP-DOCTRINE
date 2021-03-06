<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
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
    private $nom;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $cin;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @ORM\OneToMany(targetEntity=Location::class, mappedBy="clientLocation")
     */
    private $locationsClient;

    public function __construct()
    {
        $this->locationsClient = new ArrayCollection();

    }


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

    public function getCin(): ?int
    {
        return $this->cin;
    }

    public function setCin(?int $cin): self
    {
        $this->cin = $cin;

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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * @return Collection|Location[]
     */
    public function getLocationsClient(): Collection
    {
        return $this->locationsClient;
    }

    public function addLocationsClient(Location $locationsClient): self
    {
        if (!$this->locationsClient->contains($locationsClient)) {
            $this->locationsClient[] = $locationsClient;
            $locationsClient->setClientLocation($this);
        }

        return $this;
    }

    public function removeLocationsClient(Location $locationsClient): self
    {
        if ($this->locationsClient->removeElement($locationsClient)) {
            // set the owning side to null (unless already changed)
            if ($locationsClient->getClientLocation() === $this) {
                $locationsClient->setClientLocation(null);
            }
        }

        return $this;
    }




}
