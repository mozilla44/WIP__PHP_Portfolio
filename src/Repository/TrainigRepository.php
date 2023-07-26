<?php

namespace App\Repository;

use App\Entity\Trainig;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Trainig>
 *
 * @method Trainig|null find($id, $lockMode = null, $lockVersion = null)
 * @method Trainig|null findOneBy(array $criteria, array $orderBy = null)
 * @method Trainig[]    findAll()
 * @method Trainig[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TrainigRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Trainig::class);
    }

//    /**
//     * @return Trainig[] Returns an array of Trainig objects
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

//    public function findOneBySomeField($value): ?Trainig
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
