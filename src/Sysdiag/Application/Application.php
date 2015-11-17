<?php


namespace Sysdiag\Application;

use Symfony\Component\Console\Application as BaseApplication;
use Symfony\Component\Console\Input\InputInterface;
use Sysdiag\Command\CommandName;
use Sysdiag\Command\DiagnosisCommand;

/**
 * Holds the custom application format for sysdiag.
 *
 * @package Sysdiag\Application
 * @author  Petre Pătrașc <petre@dreamlabs.ro>
 */
class Application extends BaseApplication
{
    /**
     * @inheritDoc
     */
    public function getDefinition()
    {
        $inputDefinition = parent::getDefinition();
        $inputDefinition->setArguments();

        return $inputDefinition;
    }

    /**
     * @inheritDoc
     */
    protected function getCommandName(InputInterface $input)
    {
        return CommandName::DIAGNOSIS;
    }

    /**
     * @inheritDoc
     */
    protected function getDefaultCommands()
    {
        $defaultCommands = parent::getDefaultCommands();

        $defaultCommands[] = new DiagnosisCommand();

        return $defaultCommands;
    }

}
