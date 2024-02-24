<?php

namespace App\Repository;

use App\Entity\DiscogsVideo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DiscogsVideo>
 *
 * @method DiscogsVideo|null find($id, $lockMode = null, $lockVersion = null)
 * @method DiscogsVideo|null findOneBy(array $criteria, array $orderBy = null)
 * @method DiscogsVideo[]    findAll()
 * @method DiscogsVideo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiscogsVideoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DiscogsVideo::class);
    }

//    /**
//     * @return DiscogsVideo[] Returns an array of DiscogsVideo objects
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

    //    public function findOneBySomeField($value): ?DiscogsVideo
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
