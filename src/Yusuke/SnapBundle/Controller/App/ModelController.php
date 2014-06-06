<?php
/**
 * Created by PhpStorm.
 * User: higakiyuusuke
 * Date: 2014/06/06
 * Time: 19:45
 */
namespace Yusuke\SnapBundle\Controller\App;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * ModelController.
 *
 * @Route("/App/model")
 */
class ModelController extends AppController
{
    /**
     * @Route("/{modelId}", name="model", requirements={"modelId" = "\d+"})
     * @Template
     */
    public function indexAction($modelId)
    {
        $modelRepository = $this->get('doctrine')->getRepository('YusukeSnapBundle:Model');
        $model = $modelRepository->selectModel($modelId);

        if ($model->getPic1()) $model->setPic1($this->container->getParameter('amazon_s3').$model->getPic1());
        if ($model->getPic2()) $model->setPic2($this->container->getParameter('amazon_s3').$model->getPic2());
        if ($model->getPic3()) $model->setPic3($this->container->getParameter('amazon_s3').$model->getPic3());

        return array(
          'Model' => $model
        );
    }
}