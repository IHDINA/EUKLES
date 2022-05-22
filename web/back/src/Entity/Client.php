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
   * @ORM\Column(type="string", length=255)
   */
  private $nomClient;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $ville;

  /**
   * @ORM\OneToMany(targetEntity=Lien::class, mappedBy="client")
   */
  private $liens;

  /**
   * Client constructor.
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
  public function getNomClient(): ?string
  {
    return $this->nomClient;
  }

  /**
   * @param string $nomClient
   * @return $this
   */
  public function setNomClient(string $nomClient): self
  {
    $this->nomClient = $nomClient;

    return $this;
  }

  /**
   * @return string|null
   */
  public function getVille(): ?string
  {
    return $this->ville;
  }

  /**
   * @param string $ville
   * @return $this
   */
  public function setVille(string $ville): self
  {
    $this->ville = $ville;

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
      $lien->setCommande($this);
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
      if ($lien->getCommande() === $this) {
        $lien->setCommande(null);
      }
    }

    return $this;
  }
}
