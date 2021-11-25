<?php

namespace App\Entity;

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
    private $serie;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_mise_circulation;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $modele;

    /**
     * @ORM\OneToMany(targetEntity=Location::class, mappedBy="voitureLoc")
     */
    private $locationsVoiture;

    /**
     * @ORM\ManyToOne(targetEntity=Modele::class, inversedBy="voitures")
     */
    private $marque;



    public function __construct()
    {
        $this->locationsVoiture = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSerie(): ?string
    {
        return $this->serie;
    }

    public function setSerie(?string $serie): self
    {
        $this->serie = $serie;

        return $this;
    }

    public function getDateMiseCirculation(): ?\DateTimeInterface
    {
        return $this->date_mise_circulation;
    }

    public function setDateMiseCirculation(?\DateTimeInterface $date_mise_circulation): self
    {
        $this->date_mise_circulation = $date_mise_circulation;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getModele()
    {
        return $this->modele;
    }

    /**
     * @param mixed $modele
     */
    public function setModele($modele): void
    {
        $this->modele = $modele;
    }

    /**
     * @return Collection|Location[]
     */
    public function getLocationsVoiture(): Collection
    {
        return $this->locationsVoiture;
    }

    public function addLocationsVoiture(Location $locationsVoiture): self
    {
        if (!$this->locationsVoiture->contains($locationsVoiture)) {
            $this->locationsVoiture[] = $locationsVoiture;
            $locationsVoiture->setVoitureLoc($this);
        }

        return $this;
    }

    public function removeLocationsVoiture(Location $locationsVoiture): self
    {
        if ($this->locationsVoiture->removeElement($locationsVoiture)) {
            // set the owning side to null (unless already changed)
            if ($locationsVoiture->getVoitureLoc() === $this) {
                $locationsVoiture->setVoitureLoc(null);
            }
        }

        return $this;
    }

    public function getMarque(): ?Modele
    {
        return $this->marque;
    }

    public function setMarque(?Modele $marque): self
    {
        $this->marque = $marque;

        return $this;
    }





}
