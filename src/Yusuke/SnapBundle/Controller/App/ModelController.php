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
    public function indexAction(Request $request, $modelId)
    {
        $modelRepository = $this->get('doctrine')->getRepository('YusukeSnapBundle:Model');
        $model = $modelRepository->selectModel($modelId);

        if ($model->getPic1()) $model->setPic1($this->container->getParameter('thumbnail_dir').$model->getPic1());
        if ($model->getPic2()) $model->setPic2($this->container->getParameter('thumbnail_dir').$model->getPic2());
        if ($model->getPic3()) $model->setPic3($this->container->getParameter('thumbnail_dir').$model->getPic3());
        $model->setUrl($request->getUri());

        $prevModel = $modelRepository->selectPrevModel($modelId);
        $prevModelUrl = ($prevModel) ? $request->getUriForPath('/App/model/').$prevModel[0]->getId() : NULL;
        $nextModel = $modelRepository->selectNextModel($modelId);
        $nextModelUrl = ($nextModel) ? $request->getUriForPath('/App/model/').$nextModel[0]->getId() : NULL;

        return array(
          'Model' => $model,
          'PrevModelUrl' => $prevModelUrl,
          'NextModelUrl' => $nextModelUrl
        );
    }
}