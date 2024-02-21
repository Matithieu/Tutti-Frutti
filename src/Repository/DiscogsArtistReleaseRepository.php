<?php

namespace App\Repository;

use App\Entity\DiscogsArtistRelease;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DiscogsArtistRelease>
 *
 * @method DiscogsArtistRelease|null find($id, $lockMode = null, $lockVersion = null)
 * @method DiscogsArtistRelease|null findOneBy(array $criteria, array $orderBy = null)
 * @method DiscogsArtistRelease[]    findAll()
 * @method DiscogsArtistRelease[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiscogsArtistReleaseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DiscogsArtistRelease::class);
    }

//    /**
//     * @return DiscogsArtistRelease[] Returns an array of DiscogsArtistRelease objects
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

//    public function findOneBySomeField($value): ?DiscogsArtistRelease
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
