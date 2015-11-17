<?php


namespace Sysdiag\Diagnoser;

/**
 * Defines the interactions available with diagnosers.
 *
 * @package Sysdiag\Diagnoser
 * @author  Petre Pătrașc <petre@dreamlabs.ro>
 */
interface DiagnoserInterface
{
    /**
     * Run a diagnostic.
     *
     * @return array
     */
    public function diagnose();
}
