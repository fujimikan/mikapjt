<?php

namespace App\Repository;

use App\Entity\MstAccount;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MstAccount|null find($id, $lockMode = null, $lockVersion = null)
 * @method MstAccount|null findOneBy(array $criteria, array $orderBy = null)
 * @method MstAccount[]    findAll()
 * @method MstAccount[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MstAccountRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MstAccount::class);
    }

    // /**
    //  * @return MstAccount[] Returns an array of MstAccount objects
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
    public function findOneBySomeField($value): ?MstAccount
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
