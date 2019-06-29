<?php

namespace Lej\Console\Commands;

use Nwidart\Modules\Commands\RouteProviderMakeCommand as RouteProviderMakeCommandMain;

class RouteProviderMakeCommand extends RouteProviderMakeCommandMain
{
    /**
     * @inheritdoc
     */
    protected function getTemplateContents()
    {
        return str_replace('$EXT_ROUTES_PATH$', $this->getExtRoutesPath(), parent::getTemplateContents());
    }

    /**
     * @inheritdoc
     */
    protected function getExtRoutesPath()
    {
        return '/' . $this->laravel['modules']->config('stubs.files.routes/ext', 'Routes/ext.php');
    }
}
