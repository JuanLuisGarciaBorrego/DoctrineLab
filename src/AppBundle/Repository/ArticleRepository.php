<?php

namespace AppBundle\Repository;

class ArticleRepository extends \Doctrine\ORM\EntityRepository
{
    public function findDate()
    {
        $now = new \DateTime('2016-04-28 00:20:10');

        return $this->createQueryBuilder('a')
            ->where('DATE(a.datetime) = :date')
            ->setParameter('date', $now->format('Y-m-d'))
            ->getQuery()
            ->execute();
    }
}