<?php


namespace Sysdiag\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Configuration and execution logic for the command that
 * runs diagnostics.
 *
 * @package Sysdiag\Command
 * @author  Petre Pătrașc <petre@dreamlabs.ro>
 */
class DiagnosisCommand extends Command
{
    /**
     * @inheritDoc
     */
    protected function configure()
    {
        parent::configure();

        $this
            ->setName(CommandName::DIAGNOSIS)
            ->setDescription('Runs diagnostics through system utilities');
    }

    /**
     * @inheritDoc
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Running system diagnostics');
    }

}
