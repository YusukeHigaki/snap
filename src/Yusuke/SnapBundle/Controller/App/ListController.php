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
        $models = $modelRepository->selectModels($this->container->getParameter('snaplist_limit'));
        return array(
            'Models' => $models,
        );
    }

}