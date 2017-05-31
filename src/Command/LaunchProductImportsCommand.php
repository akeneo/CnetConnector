<?php

namespace Pim\Bundle\CnetConnectorBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\PhpExecutableFinder;

/**
 * As CNET provides many CSV files for products, here is a command to handle them automatically one per one
 *
 * @author    Romain Monceau <romain@akeneo.com>
 * @copyright 2016 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class LaunchProductImportsCommand extends ContainerAwareCommand
{
    /** @var int */
    static protected $parallelJobs = 0;

    /** @var string */
    protected $rootDir;

    /** @var string */
    protected $env;

    /** @var string */
    protected $phpDir;

    /** @var int */
    protected $maxParallelJobs = 1;

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('pim:cnet-connector:launch-product-imports')
            ->setDescription('Launch product imports from a directory.')
            ->addArgument('path', InputArgument::REQUIRED, 'The directory path where the product CSV files are.')
            ->addArgument('max_parallel_jobs', InputArgument::OPTIONAL, 'The max parallel jobs (default = 1)', 1);
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

        foreach (scandir($directoryPath) as $key => $directory) {
            if ($directory !== ".." && $directory !== ".") {
                $dir = $directoryPath . DIRECTORY_SEPARATOR . $directory;

                foreach (scandir($dir) as $filepath) {
                    $filepath = $dir . DIRECTORY_SEPARATOR . $filepath;
                    if (is_file($filepath)) {
                        $this->launchJob($output, $filepath);
                    }
                }
            }
        }
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        parent::initialize($input, $output);

        $this->rootDir = $this->getContainer()->getParameter('kernel.root_dir');
        $this->env = $this->getContainer()->getParameter('kernel.environment');
        $phpPathFinder = new PhpExecutableFinder();
        $this->phpDir = $phpPathFinder->find();
        $this->maxParallelJobs = $input->getArgument('max_parallel_jobs');
    }

    /**
     * @param OutputInterface $output
     * @param string $filepath
     */
    protected function launchJob(OutputInterface $output, $filepath)
    {
        $config = sprintf('--config="{\"filePath\":\"%s\"}"', $filepath);
        $command = sprintf("akeneo:batch:job %s %s", "csv_product_import", $config);
        $cmd = sprintf('%s %s/console --env=%s %s', $this->phpDir, $this->rootDir, $this->env, $command);

        $output->writeln(sprintf('<info>Executing products import for: "%s"</info>', $filepath));
        if (++static::$parallelJobs % $this->maxParallelJobs === 0) {
            $result = exec($cmd);
            while (exec('ps -aux | grep akeneo:batch | wc -l') <= 1) {
                sleep(10);
            }
        } else {
            $result = exec(sprintf('%s $cmd >> %s 2>&1 &', $cmd, '/tmp/cnet_logfile.txt'));
        }
        $output->writeln(sprintf('<info>%s</info>', $result));
    }
}
