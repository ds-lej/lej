<?php

namespace Lej\Console\Commands;

use Symfony\Component\Console\Input\InputOption;
use Nwidart\Modules\Commands\ControllerMakeCommand as ControllerMakeCommandMain;

class ControllerMakeCommand extends ControllerMakeCommandMain
{
    public function handle()
    {
        if ($this->option('ext') === true)
            $this->input->setOption('api', true);

        parent::handle();
    }

    /**
     * @inheritdoc
     */
    protected function getOptions()
    {
        $options = parent::getOptions();
        $options[] = ['ext', null, InputOption::VALUE_NONE, 'Controller for Ext Routes.'];

        return $options;
    }
}
