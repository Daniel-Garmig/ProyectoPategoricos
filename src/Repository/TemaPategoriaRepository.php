<?php

namespace App\Repository;

use App\Entity\TemaPategoria;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TemaPategoria>
 *
 * @method TemaPategoria|null find($id, $lockMode = null, $lockVersion = null)
 * @method TemaPategoria|null findOneBy(array $criteria, array $orderBy = null)
 * @method TemaPategoria[]    findAll()
 * @method TemaPategoria[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TemaPategoriaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TemaPategoria::class);
    }

//    /**
//     * @return TemaPategoria[] Returns an array of TemaPategoria objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TemaPategoria
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
