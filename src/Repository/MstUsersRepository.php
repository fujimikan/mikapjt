<?php

namespace App\Repository;

use App\Entity\MstUsers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MstUsers|null find($id, $lockMode = null, $lockVersion = null)
 * @method MstUsers|null findOneBy(array $criteria, array $orderBy = null)
 * @method MstUsers[]    findAll()
 * @method MstUsers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MstUsersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MstUsers::class);
    }

    // /**
    //  * @return MstUsers[] Returns an array of MstUsers objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MstUsers
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
