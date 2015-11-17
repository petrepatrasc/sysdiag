<?php


namespace Sysdiag\Tests\Unit\Command;


use Sysdiag\Application\Application;
use Sysdiag\Command\DiagnosisCommand;

/**
 * Abstract class implemented by all command unit tests.
 *
 * @package Sysdiag\Tests\Unit\Command
 * @author  Petre Pătrașc <petre@dreamlabs.ro>
 */
abstract class AbstractCommandUnitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Application
     */
    protected $application;

    /**
     * @inheritDoc
     */
    protected function setUp()
    {
        parent::setUp();

        $this->application = new Application();

        $this->application->add(new DiagnosisCommand());
    }

    /**
     * Get the name of the command that is going to be tested.
     *
     * @return string
     */
    abstract public function getTestedCommandName();

    /**
     * @return Application
     */
    public function getApplication()
    {
        return $this->application;
    }
}
