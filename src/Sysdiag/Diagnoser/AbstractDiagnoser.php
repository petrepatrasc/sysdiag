<?php


namespace Sysdiag\Diagnoser;
use Symfony\Component\Console\Helper\ProcessHelper;
use Symfony\Component\Console\Output\NullOutput;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\ProcessBuilder;
use Sysdiag\Parser\MemoryStatusTransformer;

/**
 * Defines an abstract diagnoser.
 *
 * @package Sysdiag\Diagnoser
 * @author  Petre Pătrașc <petre@dreamlabs.ro>
 */
abstract class AbstractDiagnoser
{
    /**
     * @var ProcessHelper
     */
    protected $processHelper;

    /**
     * @var Process
     */
    protected $process;

    /**
     * @var OutputInterface
     */
    protected $output;

    /**
     * @var MemoryStatusTransformer
     */
    protected $transformer;

    /**
     * AbstractDiagnoser constructor.
     *
     * @param ProcessHelper $processHelper
     */
    public function __construct(ProcessHelper $processHelper)
    {
        $this->processHelper = $processHelper;
        $this->process = ProcessBuilder::create($this->getProcessDefinition())->getProcess();
        $this->output = new NullOutput();
        $this->transformer = $this->getTransformer();
    }

    /**
     * Get the definition of the process that needs to be run.
     *
     * @return array
     */
    abstract public function getProcessDefinition();

    /**
     * Get the transformer associated to the command.
     *
     * @return MemoryStatusTransformer
     */
    abstract public function getTransformer();

    /**
     * @inheritDoc
     */
    public function diagnose()
    {
        $this->processHelper->run($this->output, $this->process);
        $processOutput = $this->process->getOutput();

        return $this->transformer->transform($processOutput);
    }
}
