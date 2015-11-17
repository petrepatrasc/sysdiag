<?php


namespace Sysdiag\Parser;

/**
 * Transforms the output of a process into a data object.
 *
 * @package Sysdiag\Parser
 * @author  Petre Pătrașc <petre@dreamlabs.ro>
 */
interface TransformerInterface
{
    /**
     * Transform the output of a process into an array of data objects
     * containing the information returned.
     *
     * @param string $output The output from the process that was executed.
     *
     * @return array
     */
    public function transform($output);
}
