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

    public function createDiscogsMaster(DiscogsMaster $discogsMaster): void
    {
        $this->getEntityManager()->persist($discogsMaster);
        $this->getEntityManager()->flush();
    }

    /**
     * filtrer en fonction des critères suivants :
        - Fruit
        - Année
        - Nom du groupe
        - Label
        - Genre
        - Format
     */
    public function findDiscogsMasterByFruit(string $fruit): array
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.fruit = :fruit')
            ->setParameter('fruit', $fruit)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findDiscogsMasterByYear(int $year): array
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.year = :year')
            ->setParameter('year', $year)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findDiscogsMasterByName(string $name): array
    {
        return $this->createQueryBuilder('d')
            ->join('d.artists', 'a')
            ->andWhere('a.name = :name')
            ->setParameter('name', $name)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findDiscogsMasterByLabel(string $label): array
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.label = :label')
            ->setParameter('label', $label)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findDiscogsMasterByGenre(string $genres): array
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.genres = :genres')
            ->setParameter('genres', $genres)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findDiscogsMasterByFormat(string $format): array
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.format = :format')
            ->setParameter('format', $format)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
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
