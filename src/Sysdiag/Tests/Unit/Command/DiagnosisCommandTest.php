<?php


namespace Sysdiag\Tests\Unit\Command;

use Symfony\Component\Console\Tester\CommandTester;
use Sysdiag\Command\CommandName;

/**
 * Tests the behaviour of the diagnosis command in isolation.
 *
 * @package Sysdiag\Tests\Unit\Command
 * @author  Petre Pătrașc <petre@dreamlabs.ro>
 */
class DiagnosisCommandTest extends AbstractCommandUnitTest
{
    /**
     * @inheritDoc
     */
    public function getTestedCommandName()
    {
        return CommandName::DIAGNOSIS;
    }

    public function testGivenNoOptionsThenRunningTheCommandWillWorkSuccessfullyAndWillReturnOutput()
    {
        $command       = $this->getApplication()->get($this->getTestedCommandName());
        $commandTester = new CommandTester($command);

        $commandTester->execute([]);

        $this->assertNotNull($commandTester->getDisplay(), 'Nothing was returned from the command, it most likely did not execute correctly.');
    }
}
