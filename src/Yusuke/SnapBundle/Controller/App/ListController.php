<?php
/**
 * Created by PhpStorm.
 * User: higakiyuusuke
 * Date: 2014/06/05
 * Time: 18:29
 */
namespace Yusuke\SnapBundle\Controller\App;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Yusuke\SnapBundle\Exception\ClientErrorException;

/**
 * ListController.
 *
 * @Route("/App/list")
 */
class ListController extends AppController
{
    /**
     * @Route("/", name="list")
     * @Template
     */
    public function indexAction(Request $request)
    {
        $modelRepository = $this->get('doctrine')->getRepository('YusukeSnapBundle:Model');
        $paginator = $this->get('knp_paginator');
        $models = $modelRepository->selectModels(
            $paginator,
            $request->query->get('p',1),
            $this->container->getParameter('snaplist_limit')
        );
        foreach ($models as $model){
            $model->setPic1($this->container->getParameter('thumbnail_dir').$model->getPic1());
        }
        return array(
            'Models' => $models,
        );
    }
}