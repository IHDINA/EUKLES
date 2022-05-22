<?php

namespace App\Entity;

use App\Repository\LienRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LienRepository::class)
 */
class Lien
{
  /**
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="liens")
   * @ORM\JoinColumn(nullable=false)
   */
  private $client;

  /**
   * @ORM\ManyToOne(targetEntity=Materiel::class, inversedBy="liens")
   * @ORM\JoinColumn(nullable=false)
   */
  private $materiel;

  /**
   * @ORM\Column(type="integer")
   */
  private $qte;

  /**
   * @return int|null
   */
  public function getId(): ?int
  {
    return $this->id;
  }

  /**
   * @return Client|null
   */
  public function getClient(): ?Client
  {
    return $this->client;
  }

  /**
   * @param Client|null $client
   * @return $this
   */
  public function setClient(?Client $client): self
  {
    $this->client = $client;

    return $this;
  }

  /**
   * @return Materiel|null
   */
  public function getMateriel(): ?Materiel
  {
    return $this->materiel;
  }

  /**
   * @param Materiel|null $materiel
   * @return $this
   */
  public function setMateriel(?Materiel $materiel): self
  {
    $this->materiel = $materiel;

    return $this;
  }

  /**
   * @return mixed
   */
  public function getQte()
  {
    return $this->qte;
  }

  /**
   * @param mixed $qte
   */
  public function setQte($qte): void
  {
    $this->qte = $qte;
  }
}
