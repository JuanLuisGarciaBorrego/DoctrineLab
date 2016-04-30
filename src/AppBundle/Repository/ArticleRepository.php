<?php

namespace AppBundle\Repository;

class ArticleRepository extends \Doctrine\ORM\EntityRepository
{
    public function findDate()
    {
        $now = new \DateTime('2016-04-26');

        return $this->createQueryBuilder('a')
            ->where('DATE(a.datetime) = :date')
            ->setParameter('date', $now)
            ->getQuery()
            ->execute();
    }
}