<?php


namespace Sysdiag\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Sysdiag\Diagnoser\DiagnoserFactory;
use Sysdiag\Diagnoser\DiagnoserName;

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
            ->setDescription('Runs diagnostics in various system utilities');
    }

    /**
     * @inheritDoc
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Running system diagnostics');

        $processHelper = $this->getHelper('process');
        $diagnoserFactory = new DiagnoserFactory($processHelper);

        $memoryStatuses = $diagnoserFactory->create(DiagnoserName::MEMORY_STATUS)->diagnose();
    }

}
