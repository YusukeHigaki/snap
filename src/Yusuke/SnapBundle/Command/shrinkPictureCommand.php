<?php
/**
 * Created by PhpStorm.
 * User: higakiyuusuke
 * Date: 2014/06/17
 * Time: 12:11
 */
namespace Yusuke\SnapBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/*
 * ShrinkPictureCommand.
 */
class ShrinkPictureCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('yusuke:snap:shrink-picture-command')
            ->setDescription('画像を圧縮します')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $dir = $this->getContainer()->get('kernel')->getRootDir() . '/../web/img/model/';
        $originalDir = $dir.'original/';
        $thumbnailDir = $dir.'thumbnail/';

        $modelRepository = $this->getContainer()->get('doctrine')->getRepository('YusukeSnapBundle:Model');
        $models = $modelRepository->selectAllModel();

        for ($i = 0 ; $i < count($models) ; $i++){
            $canvas = ImageCreateTrueColor(980, 1480);

            if ($models[$i]->getPic1()){
                $targetImage = $originalDir.$models[$i]->getPic1();
                $image = imagecreatefromjpeg($targetImage);
                list($width, $height) = getimagesize($targetImage);
                ImageCopyResized($canvas, $image, 0, 0, 0, 0, 980, 1480, $width, $height);
                imagejpeg($canvas, $thumbnailDir.$models[$i]->getPic1(), 75);
            }
            if ($models[$i]->getPic2()){
                $targetImage = $originalDir.$models[$i]->getPic2();
                $image = imagecreatefromjpeg($targetImage);
                list($width, $height) = getimagesize($targetImage);
                ImageCopyResized($canvas, $image, 0, 0, 0, 0, 980, 1480, $width, $height);
                imagejpeg($canvas, $thumbnailDir.$models[$i]->getPic2(), 75);
            }
            if ($models[$i]->getPic3()){
                $targetImage = $originalDir.$models[$i]->getPic3();
                $image = imagecreatefromjpeg($targetImage);
                list($width, $height) = getimagesize($targetImage);
                ImageCopyResized($canvas, $image, 0, 0, 0, 0, 980, 1480, $width, $height);
                imagejpeg($canvas, $thumbnailDir.$models[$i]->getPic3(), 75);
            }
        }
        $output->writeln(sprintf('<info>サムネイル画像を生成しました</info>'));

    }
}