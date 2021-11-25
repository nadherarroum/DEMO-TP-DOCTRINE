<?php

namespace App\Entity;

use App\Repository\LocationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LocationRepository::class)
 */
class Location
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dateRetour;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prix;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Client", inversedBy="locations")
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity=Voiture::class, inversedBy="locationsVoiture")
     */
    private $voitureLoc;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateRetour(): ?string
    {
        return $this->dateRetour;
    }

    public function setDateRetour(string $dateRetour): self
    {
        $this->dateRetour = $dateRetour;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(?float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient($client): void
    {
        $this->client = $client;
    }

   


    public function getVoitureLoc(): ?Voiture
    {
        return $this->voitureLoc;
    }

    public function setVoitureLoc(?Voiture $voitureLoc): self
    {
        $this->voitureLoc = $voitureLoc;

        return $this;
    }





}
