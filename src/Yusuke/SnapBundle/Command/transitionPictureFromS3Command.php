<?php
/**
 * Created by PhpStorm.
 * User: higakiyuusuke
 * Date: 2014/06/17
 * Time: 11:08
 */
namespace Yusuke\SnapBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * TransitionPictureFromS3Command.
 */
class TransitionPictureFromS3Command extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('yusuke:snap:transition-picture-from-s3')
            ->setDescription('S3から画像を移行する')
            ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $modelRepository = $this->getContainer()->get('doctrine')->getRepository('YusukeSnapBundle:Model');
        $models = $modelRepository->selectAllModel();
        $uploadDir = $this->getContainer()->get('kernel')->getRootDir() . '/../web/img/model/original/';

        for ($i = 0 ; $i < count($models) ; $i++){
            if ($models[$i]->getPic1()) $data = file_get_contents($this->getContainer()->getParameter('amazon_s3_original').$models[$i]->getPic1());
            file_put_contents($uploadDir.$models[$i]->getPic1(), $data);
            if ($models[$i]->getPic2()) $data = file_get_contents($this->getContainer()->getParameter('amazon_s3_original').$models[$i]->getPic2());
            file_put_contents($uploadDir.$models[$i]->getPic2(), $data);
            if ($models[$i]->getPic3()) $data = file_get_contents($this->getContainer()->getParameter('amazon_s3_original').$models[$i]->getPic3());
            file_put_contents($uploadDir.$models[$i]->getPic3(), $data);
        }

        $output->writeln(sprintf('<info>S3から画像を移行しました</info>'));
    }
}