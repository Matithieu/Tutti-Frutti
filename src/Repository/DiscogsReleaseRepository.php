<?php

namespace App\Repository;

use App\Entity\DiscogsRelease;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DiscogsRelease>
 *
 * @method DiscogsRelease|null find($id, $lockMode = null, $lockVersion = null)
 * @method DiscogsRelease|null findOneBy(array $criteria, array $orderBy = null)
 * @method DiscogsRelease[]    findAll()
 * @method DiscogsRelease[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiscogsReleaseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DiscogsRelease::class);
    }

//    /**
//     * @return DiscogsRelease[] Returns an array of DiscogsRelease objects
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

//    public function findOneBySomeField($value): ?DiscogsRelease
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
