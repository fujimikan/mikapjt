<?php

namespace App\Repository;

use App\Entity\TrnExpenses;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TrnExpenses|null find($id, $lockMode = null, $lockVersion = null)
 * @method TrnExpenses|null findOneBy(array $criteria, array $orderBy = null)
 * @method TrnExpenses[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TrnExpensesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TrnExpenses::class);
    }

    public function findAll()
    {
        return $this->findBy(array(), array('id'=>'ASC'));
    }
    // /**
    //  * @return TrnExpenses[] Returns an array of TrnExpenses objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TrnExpenses
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
