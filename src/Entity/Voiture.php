<?php

namespace App\Entity;

use App\Entity\Modele;
use App\Repository\VoitureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VoitureRepository::class)
 */
class Voiture
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
    private $Serie;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateMiseEnMarche;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=2, nullable=true)
     */
    private $prixJour;

    /**
     * @ORM\OneToMany(targetEntity=Location::class, mappedBy="voiture")
     */
    private $locations;

    /**
     * @ORM\ManyToOne(targetEntity=Modele::class, inversedBy="voiture")
     */
    private $model;

    public function __construct()
    {
        $this->locations = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSerie(): ?string
    {
        return $this->Serie;
    }

    public function setSerie(?string $Serie): self
    {
        $this->Serie = $Serie;

        return $this;
    }

    public function getDateMiseEnMarche(): ?\DateTimeInterface
    {
        return $this->dateMiseEnMarche;
    }

    public function setDateMiseEnMarche(?\DateTimeInterface $dateMiseEnMarche): self
    {
        $this->dateMiseEnMarche = $dateMiseEnMarche;

        return $this;
    }
    
    public function getPrixJour(): ?string
    {
        return $this->prixJour;
    }

    public function setPrixJour(?string $prixJour): self
    {
        $this->prixJour = $prixJour;

        return $this;
    }

    /**
     * @return Collection|Location[]
     */
    public function getLocations(): Collection
    {
        return $this->locations;
    }

    public function addLocation(Location $location): self
    {
        if (!$this->locations->contains($location)) {
            $this->locations[] = $location;
            $location->setVoiture($this);
        }

        return $this;
    }

    public function removeLocation(Location $location): self
    {
        if ($this->locations->removeElement($location)) {
            // set the owning side to null (unless already changed)
            if ($location->getVoiture() === $this) {
                $location->setVoiture(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->model;
    }

    public function getModel(): ?Modele
    {
        return $this->model;
    }

    public function setModel(?Modele $model): self
    {
        $this->model = $model;

        return $this;
    }
 
}