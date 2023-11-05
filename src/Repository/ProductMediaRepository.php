<?php

namespace App\Repository;

use App\Entity\ProductMedia;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProductMedia>
 *
 * @method ProductMedia|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductMedia|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductMedia[]    findAll()
 * @method ProductMedia[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductMediaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductMedia::class);
    }

//    /**
//     * @return ProductMedia[] Returns an array of ProductMedia objects
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

//    public function findOneBySomeField($value): ?ProductMedia
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
