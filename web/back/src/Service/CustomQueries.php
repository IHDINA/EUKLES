<?php


namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;

class CustomQueries  {

  /**
   * @var EntityManagerInterface
   */
  protected $entityManager;


  /**
   * CustomQueries constructor.
   * @param EntityManagerInterface $entityManager
   */
  public function __construct(EntityManagerInterface $entityManager) {
    $this->entityManager = $entityManager;
  }

  /**
   * Get All records depending on price and quanitity
   *
   * @param float $price
   * @param int $qte
   * @return array
   */
  public function findByGreaterThanPriceAndQuantity(float $price, int $qte): array {
    $qb = $this->entityManager->createQueryBuilder();
    $fields = array('c.nomClient', 'c.ville', 'c.id', 'm.nom', 'm.prix');
    $qb->select($fields)
      ->from(' App\Entity\Client', 'c')
      ->join('c.liens', 'l')
      ->join('l.materiel', 'm')
      ->where('m.prix > :price')
      ->andWhere('l.qte > :qte')
      ->setParameter('price', $price)
      ->setParameter('qte', $qte);

    return $qb->getQuery()->getResult();
  }

  /**
   * Geet t
   *
   * @param float $price
   * @param int $qte
   * @return array
   */
  public function getRentableClient(): array {
    $qb = $this->entityManager->createQueryBuilder();
    $fields = array('c.nomClient', 'SUM(m.prix) AS totaux');
    $qb->select($fields)
      ->from(' App\Entity\Client', 'c')
      ->join('c.liens', 'l')
      ->join('l.materiel', 'm')
      ->groupBy('c.nomClient')
      ->addOrderBy('totaux', 'DESC');

    return $qb->getQuery()->getResult();
  }
}