<?php
/**
 * Created by PhpStorm.
 * User: higakiyuusuke
 * Date: 2014/06/06
 * Time: 17:33
 */
namespace Yusuke\SnapBundle\Controller\Data;

use Yusuke\SnapBundle\Controller\App\AppController;

/**
 * TransitionController.
 *
 * @Route("/Data/transition")
 */
class TransitionController extends AppController
{
    /**
     * @Route("/", name="transition")
     */
    public function index()
    {
        $snapRepository = $this->get('doctrine')->getRepository("YusukeSnapBundle:Snap");
    }
}