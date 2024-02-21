<?php

namespace App\Repository;

use App\Entity\DiscogsArtist;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DiscogsArtist>
 *
 * @method DiscogsArtist|null find($id, $lockMode = null, $lockVersion = null)
 * @method DiscogsArtist|null findOneBy(array $criteria, array $orderBy = null)
 * @method DiscogsArtist[]    findAll()
 * @method DiscogsArtist[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiscogsArtistRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DiscogsArtist::class);
    }

//    /**
//     * @return DiscogsArtist[] Returns an array of DiscogsArtist objects
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

//    public function findOneBySomeField($value): ?DiscogsArtist
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
