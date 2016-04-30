<?php

namespace AppBundle\Repository;

class ArticleRepository extends \Doctrine\ORM\EntityRepository
{
    public function findDate()
    {
        $now = new \DateTime('2016-04-28 10:54:10');

        return $this->createQueryBuilder('a')
            ->where('a.datetime = :date')
            ->setParameter('date', $now)
            ->getQuery()
            ->execute();
    }
}