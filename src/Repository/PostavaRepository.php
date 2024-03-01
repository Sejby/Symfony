<?php

namespace App\Repository;

use App\Entity\Postava;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Postava>
 *
 * @method Postava|null find($id, $lockMode = null, $lockVersion = null)
 * @method Postava|null findOneBy(array $criteria, array $orderBy = null)
 * @method Postava[]    findAll()
 * @method Postava[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostavaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Postava::class);
    }

    //    /**
    //     * @return Postava[] Returns an array of Postava objects
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

    //    public function findOneBySomeField($value): ?Postava
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
