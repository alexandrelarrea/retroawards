<?php

namespace App\Repository;

use App\Entity\RetroGame;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RetroGame|null find($id, $lockMode = null, $lockVersion = null)
 * @method RetroGame|null findOneBy(array $criteria, array $orderBy = null)
 * @method RetroGame[]    findAll()
 * @method RetroGame[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RetroGameRepository extends ServiceEntityRepository {

  public function __construct(RegistryInterface $registry) {
    parent::__construct($registry, RetroGame::class);
  }

  // /**
  //  * @return RetroGame[] Returns an array of RetroGame objects
  //  */
  /*
  public function findByExampleField($value)
  {
      return $this->createQueryBuilder('r')
          ->andWhere('r.exampleField = :val')
          ->setParameter('val', $value)
          ->orderBy('r.id', 'ASC')
          ->setMaxResults(10)
          ->getQuery()
          ->getResult()
      ;
  }
  */

  /*
  public function findOneBySomeField($value): ?RetroGame
  {
      return $this->createQueryBuilder('r')
          ->andWhere('r.exampleField = :val')
          ->setParameter('val', $value)
          ->getQuery()
          ->getOneOrNullResult()
      ;
  }
  */
}
