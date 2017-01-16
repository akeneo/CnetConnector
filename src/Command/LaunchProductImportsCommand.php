<?php

namespace Pim\Bundle\CnetConnectorBundle\Command;

use Akeneo\Component\Console\CommandLauncher;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * As CNET provides many CSV files for products, here is a command to handle them automatically one per one
 *
 * @author    Romain Monceau <romain@akeneo.com>
 * @copyright 2016 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class LaunchProductImportsCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('pim:cnet-connector:launch-product-imports')
            ->setDescription('Launch product imports from a directory.')
            ->addArgument('path', InputArgument::REQUIRED, 'The directory path where the product CSV files are.');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $directoryPath = realpath($input->getArgument('path'));

        if (false === is_dir($directoryPath)) {
            $output->writeln(sprintf('<error>Directory does not exist: "%s"</error>', $directoryPath));

            return 1;
        }

        $rootDir = $this->getContainer()->getParameter('kernel.root_dir');
        $env = $this->getContainer()->getParameter('kernel.environment');
        $cmdLauncher = new CommandLauncher($rootDir, $env);

        foreach (scandir($directoryPath) as $key => $directory) {
            if ($directory !== ".." && $directory !== ".") {
                $dir = $directoryPath . DIRECTORY_SEPARATOR . $directory;

                foreach (scandir($dir) as $filepath) {
                    $filepath = $dir . DIRECTORY_SEPARATOR . $filepath;
                    if (is_file($filepath)) {
                        $config = sprintf('--config="{\"filePath\":\"%s\"}"', $filepath);
                        $cmd = sprintf("akeneo:batch:job %s %s", "csv_product_import", $config);

                        $output->writeln(sprintf('<info>Executing products import for: "%s"</info>', $filepath));
                        $cmdLauncher->executeForeground($cmd);
                    }
                }
            }
        }
    }
}
