<?php

namespace Lej\Console\Commands;

use Lej\Console\Generators\ModuleGenerator;
use Nwidart\Modules\Commands\ModuleMakeCommand as ModuleMakeCommandMain;

class ModuleMakeCommand extends ModuleMakeCommandMain
{
    /**
     * @inheritdoc
     */
    public function handle()
    {
        $names = $this->argument('name');

        foreach ($names as $name)
        {
            with(new ModuleGenerator($name))
                ->setFilesystem($this->laravel['files'])
                ->setModule($this->laravel['modules'])
                ->setConfig($this->laravel['config'])
                ->setConsole($this)
                ->setForce($this->option('force'))
                ->setPlain($this->option('plain'))
                ->generate();
        }
    }
}
