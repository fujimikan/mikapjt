<?php

namespace App\Repository;

use App\Entity\Message;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
* @method Message|null find($id, $lockMode = null, $lockVersion = null)
* @method Message|null findOneBy(array $criteria, array $orderBy = null)
* @method Message[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
*/
class MessageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Message::class);
    }

    public function findAll()
    {
        return $this->findBy(array(), array('posted' => 'DESC'));
    }

    public function getPage($currentPage = 1, $limit = 5)
    {
        $query = $this->createQueryBuilder('p')
            ->orderBy('p.posted','DESC')
            ->getQuery();
        $paginator = $this->paginate($query, $currentPage, $limit);
        return $paginator;
    }

    public function paginate($dql, $page=1, $limit=5)
    {
        $paginator = new Paginator($dql);
        $paginator->getQuery()
            ->setFirstResult($limit * ($page - 1))
            ->setMaxResults($limit);
        return $paginator;
    }
}