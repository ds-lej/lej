<?php

namespace Ds\Support;

use Illuminate\Support\Arr;

/**
 * Asset
 * @package Ds\Support
 * @author Diamond <me@diamondsystems.org>
 */
class Asset
{
    /**
     * Assets list
     *
     * @var array
     */
    protected $assets;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->assets = [];
    }

    /**
     * Add CSS
     *
     * @param string $name
     * @param string $file
     * @param int    $priority
     * @param string $version
     *
     * @return \Ds\Support\Asset
     */
    public function addCss(string $name, string $file, int $priority = 0, string $version = null)
    {
        $this->assets['css'][$name] = ['file' => $file, 'priority' => $priority, 'version' => $version];
        return $this;
    }

    /**
     * Add JS
     *
     * @param string $name
     * @param string $file
     * @param int    $priority
     * @param string $version
     *
     * @return \Ds\Support\Asset
     */
    public function addJs(string $name, string $file, int $priority = 0, string $version = null)
    {
        $this->assets['js'][$name] = ['file' => $file, 'priority' => $priority, 'version' => $version];
        return $this;
    }

    /**
     * Get all CSS links list
     *
     * @param string $name
     * @return string
     */
    private function linkCss(string $name = null)
    {
        if (empty($this->assets['css']))
            return '';

        if (! $name)
        {
            $this->sortAssetsByPriority('css');
            $html = [];
            foreach ($this->assets['css'] as $css)
                $html[] = '<link rel="stylesheet" href="' . $this->getLink($css) . '" />';
            return implode(PHP_EOL, $html) . PHP_EOL;
        }
        elseif (isset($this->assets['css'][$name]))
            return '<link rel="stylesheet" href="' . $this->getLink($this->assets['css'][$name]) . '" />' . PHP_EOL;
        else
            return '';
    }

    /**
     * Get all JS links list
     *
     * @param string $name
     * @return string
     */
    private function linkJs(string $name = null)
    {
        if (empty($this->assets['js']))
            return '';

        if (! $name)
        {
            $this->sortAssetsByPriority('js');
            $html = [];
            foreach ($this->assets['js'] as $js)
                $html[] = '<script src="' . $this->getLink($js) . '"></script>';
            return implode(PHP_EOL, $html) . PHP_EOL;
        }
        elseif (isset($this->assets['js'][$name]))
            return '<script src="' . $this->getLink($this->assets['js'][$name]) . '"></script>' . PHP_EOL;
        else
            return '';
    }

    /**
     * @param array $asset
     * @return string
     */
    private function getLink(array $asset)
    {
        if (! isset($asset['file']))
            return '';
        return asset($asset['file']) . (isset($asset['version']) ? '?'.$asset['version'] : '');
    }

    /**
     * Sorts the assets by priority key
     *
     * @param string $type
     * @return void
     */
    private function sortAssetsByPriority(string $type)
    {
        if (empty($this->assets[$type]))
            return;

        $this->assets[$type] = array_values(Arr::sort($this->assets[$type], function ($v) {
            return $v['priority'];
        }));
    }

    /**
     * Returns CSS
     *
     * @param string $name
     * @return string
     */
    public function css(string $name = null)
    {
        return $this->linkCss($name);
    }

    /**
     * Returns JS
     *
     * @param string $name
     * @return string
     */
    public function js(string $name = null)
    {
        return $this->linkJs($name);
    }

    /**
     * All assets
     * @return string
     */
    public function all()
    {
        return $this->linkCss() . $this->linkJs();
    }
}