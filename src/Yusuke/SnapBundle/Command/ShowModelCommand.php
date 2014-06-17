<?php
/**
 * Created by PhpStorm.
 * User: higakiyuusuke
 * Date: 2014/06/08
 * Time: 12:10
 */

namespace Yusuke\SnapBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * ShowModelCommand.
 */
class ShowModelCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('yusuke:snap:show-model')
            ->setDescription('本日のモデルを公開')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $modelRepository = $this->getContainer()->get('doctrine')->getRepository('YusukeSnapBundle:Model');
        $modelRepository->updateModel();

        $output->writeln(sprintf('<info>本日のモデルを公開しました</info>'));
    }
} 