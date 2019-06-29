<?php

namespace Lej\Console\Generators;

use Nwidart\Modules\Generators\ModuleGenerator as ModuleGeneratorMain;

class ModuleGenerator extends ModuleGeneratorMain
{
    /**
     * @inheritdoc
     */
    public function generateResources()
    {
        parent::generateResources();

        $this->console->call('module:make-middleware', [
            'name' => 'Assets',
            'module' => $this->getName(),
        ]);
        $this->console->call('module:make-controller', [
            '--ext' => true,
            'controller' => 'Ext/' . $this->getName() . 'Controller',
            'module' => $this->getName(),
        ]);
    }
}
