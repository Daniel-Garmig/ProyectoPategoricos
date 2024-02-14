<?php

namespace App\Repository;

use App\Entity\Pategoria;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Pategoria>
 *
 * @method Pategoria|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pategoria|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pategoria[]    findAll()
 * @method Pategoria[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PategoriaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pategoria::class);
    }

//    /**
//     * @return Pategoria[] Returns an array of Pategoria objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Pategoria
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
