<?php

namespace App\Entity;

use App\Repository\NavireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NavireRepository::class)
 */
class Navire
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
    private $imo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mmsi;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $indicatifAppel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $eta;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImo(): ?string
    {
        return $this->imo;
    }

    public function setImo(string $imo): self
    {
        $this->imo = $imo;

        return $this;
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

    public function getMmsi(): ?string
    {
        return $this->mmsi;
    }

    public function setMmsi(string $mmsi): self
    {
        $this->mmsi = $mmsi;

        return $this;
    }

    public function getIndicatifAppel(): ?string
    {
        return $this->indicatifAppel;
    }

    public function setIndicatifAppel(string $indicatifAppel): self
    {
        $this->indicatifAppel = $indicatifAppel;

        return $this;
    }

    public function getEta(): ?string
    {
        return $this->eta;
    }

    public function setEta(string $eta): self
    {
        $this->eta = $eta;

        return $this;
    }
}
