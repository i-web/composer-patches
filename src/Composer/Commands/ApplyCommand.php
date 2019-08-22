<?php
/**
 * Copyright © Vaimo Group. All rights reserved.
 * See LICENSE_VAIMO.txt for license details.
 */
namespace Vaimo\ComposerPatches\Composer\Commands;

use Symfony\Component\Console\Input\InputInterface;

class ApplyCommand extends \Vaimo\ComposerPatches\Composer\Commands\PatchCommand
{
    protected function configure()
    {
        parent::configure();

        $this->setName('patch:apply');

        $this->setDescription('Apply a patch or patches for certain package(s)');

        $definition = $this->getDefinition();
        $options = $definition->getOptions();

        unset($options['redo'], $options['undo']);

        $definition->setOptions($options);
    }

    protected function getBehaviourFlags(InputInterface $input)
    {
        return array(
            'redo' => false,
            'undo' => false,
            'force' => false
        );
    }
}
