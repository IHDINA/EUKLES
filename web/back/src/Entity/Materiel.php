<?php

namespace App\Entity;

use App\Repository\MaterielRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MaterielRepository::class)
 */
class Materiel
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
    private $nom;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\OneToMany(targetEntity=Lien::class, mappedBy="materiel")
     */
    private $liens;

  /**
   * Materiel constructor.
   */
  public function __construct()
    {
        $this->liens = new ArrayCollection();
    }

  /**
   * @return int|null
   */
  public function getId(): ?int
    {
        return $this->id;
    }

  /**
   * @return string|null
   */
  public function getNom(): ?string
    {
        return $this->nom;
    }

  /**
   * @param string $nom
   * @return $this
   */
  public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

  /**
   * @return float|null
   */
  public function getPrix(): ?float
    {
        return $this->prix;
    }

  /**
   * @param float $prix
   * @return $this
   */
  public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * @return Collection<int, Lien>
     */
    public function getLiens(): Collection
    {
        return $this->liens;
    }

  /**
   * @param Lien $lien
   * @return $this
   */
  public function addLien(Lien $lien): self
    {
        if (!$this->liens->contains($lien)) {
            $this->liens[] = $lien;
            $lien->setMateriel($this);
        }

        return $this;
    }

  /**
   * @param Lien $lien
   * @return $this
   */
  public function removeLien(Lien $lien): self
    {
        if ($this->liens->removeElement($lien)) {
            // set the owning side to null (unless already changed)
            if ($lien->getMateriel() === $this) {
                $lien->setMateriel(null);
            }
        }

        return $this;
    }
}
