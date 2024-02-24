<?php

namespace App\Repository;

use App\Entity\DiscogsTrack;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DiscogsTrack>
 *
 * @method DiscogsTrack|null find($id, $lockMode = null, $lockVersion = null)
 * @method DiscogsTrack|null findOneBy(array $criteria, array $orderBy = null)
 * @method DiscogsTrack[]    findAll()
 * @method DiscogsTrack[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiscogsTrackRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DiscogsTrack::class);
    }

//    /**
//     * @return DiscogsTrack[] Returns an array of DiscogsTrack objects
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

//    public function findOneBySomeField($value): ?DiscogsTrack
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
