<?php

namespace App\Repository;

use App\Entity\ProjectStudent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ProjectStudent|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProjectStudent|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProjectStudent[]    findAll()
 * @method ProjectStudent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjectStudentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProjectStudent::class);
    }

    // /**
    //  * @return ProjectStudent[] Returns an array of ProjectStudent objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ProjectStudent
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
