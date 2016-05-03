<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ArticuloRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ArticuloRepository extends EntityRepository
{
    public function totalArticulosById($id)
    {
        $qb = $this->createQueryBuilder('a')
            ->leftJoin('a.pedido', 'pedido')
            ->andWhere('pedido.id = :id')
            ->setParameter('id', $id)
            ->addOrderBy('a.nombre', 'DESC')
            ->getQuery()
            ->execute()
        ;
        return $qb;
    }
}