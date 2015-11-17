<?php


namespace Sysdiag\Diagnoser;

use Symfony\Component\Console\Helper\ProcessHelper;
use Sysdiag\Exception\InvalidArgumentException;

/**
 * Creates instances of diagnosers.
 *
 * @package Sysdiag\Diagnoser
 * @author  Petre Pătrașc <petre@dreamlabs.ro>
 */
class DiagnoserFactory
{
    /**
     * @var ProcessHelper
     */
    protected $processHelper;

    /**
     * DiagnoserFactory constructor.
     *
     * @param ProcessHelper $helper
     */
    public function __construct(ProcessHelper $helper)
    {
        $this->processHelper = $helper;
    }

    /**
     * Create a new dispatcher.
     *
     * @param string $name The name of the dispatcher to create.
     *
     * @return DiagnoserInterface
     */
    public function create($name)
    {
        switch ($name) {
            case DiagnoserName::MEMORY_STATUS:
                return new MemoryStatusDiagnoser($this->processHelper);
            default:
                throw new InvalidArgumentException('You need to specify a valid dispatcher');
        }
    }
}
