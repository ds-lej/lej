<?php

namespace Lej\Console\Commands;

use Nwidart\Modules\Support\Stub;
use Nwidart\Modules\Commands\MiddlewareMakeCommand as MiddlewareMakeCommandMain;

class MiddlewareMakeCommand extends MiddlewareMakeCommandMain
{
    /**
     * @inheritdoc
     */
    protected function getTemplateContents()
    {
        $module = $this->laravel['modules']->findOrFail($this->getModuleName());

        return (new Stub('/middleware.stub', [
            'NAMESPACE'  => $this->getClassNamespace($module),
            'CLASS'      => $this->getClass(),
            'LOWER_NAME' => $module->getLowerName(),
        ]))->render();
    }
}
