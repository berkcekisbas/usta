<?php

namespace TanimlamalarBundle\Repository;

/**
 * OguzhanRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class OguzhanRepository extends \Doctrine\ORM\EntityRepository
{
    public function test($ad)
    {
        return $this->getEntityManager()->createQueryBuilder('p')
        ->setParameter('ad', 'Berk')
        ->where('p.ad = :ad')
        ->getQuery();

    }
}
