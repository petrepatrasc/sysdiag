<?php


namespace Sysdiag\Diagnoser;

use Sysdiag\Parser\MemoryStatusTransformer;

/**
 * Performs a memory diagnosis check.
 *
 * @package Sysdiag\Diagnoser
 * @author  Petre Pătrașc <petre@dreamlabs.ro>
 */
class MemoryStatusDiagnoser extends AbstractDiagnoser implements DiagnoserInterface
{
    /**
     * @inheritDoc
     */
    public function getProcessDefinition()
    {
        return [
            'free',
            '-m',
        ];
    }

    /**
     * @inheritDoc
     */
    public function getTransformer()
    {
        return new MemoryStatusTransformer();
    }
}
