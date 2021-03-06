<?php

namespace Yusuke\SnapBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Knp\Component\Pager\Paginator;

/**
 * ModelRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ModelRepository extends EntityRepository
{
    public function selectModels(Paginator $paginator, $page, $limit)
    {
        $qb = $this->createQueryBuilder('m')
            ->where('m.pic1 IS NOT NULL')
            ->andWhere('m.showFlag = 1')
            ->andWhere('m.deleteFlag = 0')
            ->orderBy('m.id','DESC')
            ->setMaxResults($limit)
            ->getQuery()
        ;
        $pagination = $paginator->paginate($qb, $page, $limit);
        return $pagination;
    }

    public function selectModel($modelId)
    {
        $model = $this->findOneBy(array(
            'id' => $modelId,
            'deleteFlag' => 0
        ));
        return $model;
    }

    public function selectPrevModel($modelId)
    {
        $qb = $this->createQueryBuilder('m')
            ->where('m.id < :modelId')
            ->setParameter('modelId', $modelId)
            ->andWhere('m.showFlag = 1')
            ->andWhere('m.deleteFlag = 0')
            ->orderBy('m.id','DESC')
            ->setMaxResults(1)
            ->getQuery()
        ;
        $prevModel = $qb->getResult();
        return $prevModel;
    }

    public function selectNextModel($modelId)
    {
        $qb = $this->createQueryBuilder('m')
            ->where('m.id > :modelId')
            ->setParameter('modelId', $modelId)
            ->andWhere('m.showFlag = 1')
            ->andWhere('m.deleteFlag = 0')
            ->orderBy('m.id','ASC')
            ->setMaxResults(1)
            ->getQuery()
        ;
        $nextModel = $qb->getResult();
        return $nextModel;
    }

    public function selectTodayModel($yesterdayModelId)
    {
        $qb = $this->createQueryBuilder('m')
            ->where('m.id > :yesterdayModelId')
            ->setParameter('yesterdayModelId', $yesterdayModelId)
            ->andWhere('m.showFlag = 0')
            ->andWhere('m.deleteFlag = 0')
            ->orderBy('m.id','ASC')
            ->setMaxResults(1)
            ->getQuery()
        ;
        $todayModel = $qb->getResult();
        return $todayModel;
    }

    public function updateModel()
    {
        $yesterdayModel = $this->findOneBy(array('deleteFlag' => 0, 'showFlag' => 1), array('id' => 'DESC'), 1);
        $todayModel = $this->selectTodayModel($yesterdayModel->getId());
        $todayModel[0]->setShowFlag(1);
        $em = $this->getEntityManager();
        $em->persist($todayModel[0]);
        $em->flush();
    }

    public function selectAllModel()
    {
        $qb = $this->createQueryBuilder('m')
            ->where('m.pic1 IS NOT NULL')
            ->andWhere('m.showFlag = 1')
            ->andWhere('m.deleteFlag = 0')
            ->getQuery()
        ;
        $AllModel = $qb->getResult();
        return $AllModel;
    }

}
