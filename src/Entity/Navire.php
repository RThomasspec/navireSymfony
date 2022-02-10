<?php

namespace App\Entity;

use App\Repository\NavireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=NavireRepository::class)
 * @ORM\Table( name="navire",
 *              uniqueConstraints={@ORM\UniqueConstraint(name="mmsi_unique",columns={"mmsi"})}
 * )
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
     * @ORM\Column(type="string",length=7, unique=true)
     * @Assert\Regex(
     *          pattern="/[1-9] [7]/",
     *          message="Le numéro Imo doit comporter 7 chiffres")
     */
    private $imo;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\Length(
     *          min=3,
     *          max=100)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=9)
     */
    private $mmsi;

    /**
     * @ORM\Column(type="string",name="indicatifappel", length=10)
     */
    private $IndicatifAppel;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $eta;

 




    public function __construct()
    {
        $this->lePort = new ArrayCollection();
        $this->lesEscales = new ArrayCollection();
    }

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
        return $this->IndicatifAppel;
    }

    public function setIndicatifAppel(string $IndicatifAppel): self
    {
        $this->IndicatifAppel = $IndicatifAppel;

        return $this;
    }

    public function getEta(): ?\DateTimeInterface
    {
        return $this->eta;
    }

    public function setEta(?\DateTimeInterface $eta): self
    {
        $this->eta = $eta;

        return $this;
    }

    public function getAisShipeType(): ?AisShipType
    {
        return $this->AisShipeType;
    }

    public function setAisShipeType(?AisShipType $AisShipeType): self
    {
        $this->AisShipeType = $AisShipeType;

        return $this;
    }

    public function getLePavillon(): ?Pays
    {
        return $this->lePavillon;
    }

    public function setLePavillon(?Pays $lePavillon): self
    {
        $this->lePavillon = $lePavillon;

        return $this;
    }

    public function getPortDestination(): ?Port
    {
        return $this->portDestination;
    }

    public function setPortDestination(?Port $portDestination): self
    {
        $this->portDestination = $portDestination;

        return $this;
    }

    /**
     * @return Collection|Escale[]
     */
    public function getLePort(): Collection
    {
        return $this->lePort;
    }

    public function addLePort(Escale $lePort): self
    {
        if (!$this->lePort->contains($lePort)) {
            $this->lePort[] = $lePort;
            $lePort->setLeNavire($this);
        }

        return $this;
    }

    public function removeLePort(Escale $lePort): self
    {
        if ($this->lePort->removeElement($lePort)) {
            // set the owning side to null (unless already changed)
            if ($lePort->getLeNavire() === $this) {
                $lePort->setLeNavire(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Escale[]
     */
    public function getLesEscales(): Collection
    {
        return $this->lesEscales;
    }

    public function addLesEscale(Escale $lesEscale): self
    {
        if (!$this->lesEscales->contains($lesEscale)) {
            $this->lesEscales[] = $lesEscale;
            $lesEscale->setLeNavire($this);
        }

        return $this;
    }

    public function removeLesEscale(Escale $lesEscale): self
    {
        if ($this->lesEscales->removeElement($lesEscale)) {
            // set the owning side to null (unless already changed)
            if ($lesEscale->getLeNavire() === $this) {
                $lesEscale->setLeNavire(null);
            }
        }

        return $this;
    }
}
