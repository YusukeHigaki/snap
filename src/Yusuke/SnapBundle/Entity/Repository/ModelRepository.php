<?php

namespace Yusuke\SnapBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ModelRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ModelRepository extends EntityRepository
{
    public function selectModels($limit)
    {
        $qb = $this->createQueryBuilder('m')
            ->where('m.pic1 IS NOT NULL')
            ->andWhere('m.showFlag = 1')
            ->andWhere('m.deleteFlag = 0')
            ->orderBy('m.id','DESC')
            ->setMaxResults($limit)
            ->getQuery()
        ;
        $models = $qb->getResult();
        return $models;
    }

    public function selectModel($modelId)
    {
        $model = $this->findOneBy(array(
            'id' => $modelId,
            'deleteFlag' => 0
        ));
        return $model;
    }
}
