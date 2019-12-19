<?php

namespace App\Repository;

use App\Entity\HackathonRegistration;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method HackathonRegistration|null find($id, $lockMode = null, $lockVersion = null)
 * @method HackathonRegistration|null findOneBy(array $criteria, array $orderBy = null)
 * @method HackathonRegistration[]    findAll()
 * @method HackathonRegistration[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HackathonRegistrationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HackathonRegistration::class);
    }

    // /**
    //  * @return HackathonRegistration[] Returns an array of HackathonRegistration objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HackathonRegistration
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
