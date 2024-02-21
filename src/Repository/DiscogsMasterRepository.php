<?php

namespace App\Repository;

use App\Entity\DiscogsMaster;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DiscogsMaster>
 *
 * @method DiscogsMaster|null find($id, $lockMode = null, $lockVersion = null)
 * @method DiscogsMaster|null findOneBy(array $criteria, array $orderBy = null)
 * @method DiscogsMaster[]    findAll()
 * @method DiscogsMaster[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiscogsMasterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DiscogsMaster::class);
    }

//    /**
//     * @return DiscogsMaster[] Returns an array of DiscogsMaster objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DiscogsMaster
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
