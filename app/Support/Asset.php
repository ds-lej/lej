<?php

namespace Lej\Support;

use Illuminate\Support\Arr;

/**
 * Asset
 * @package Lej\Support
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
     * Add asset
     *
     * @param string $type
     * @param string $name
     * @param string $file
     * @param string|bool $version
     * @param int|string|array $priorityOrDepends
     */
    private function addAsset(string $type, string $name, string $file, $version = null, $priorityOrDepends = 100)
    {
        $assetData = [
            'file'     => $file,
            'priority' => 100,
            'version'  => $version,
            'depends'  => [],
        ];
        if (is_numeric($priorityOrDepends))
            $assetData['priority'] = $priorityOrDepends;
        elseif (is_string($priorityOrDepends))
            $assetData['depends'] = [$priorityOrDepends];
        elseif (is_array($priorityOrDepends))
            $assetData['depends'] = array_values($priorityOrDepends);

        $this->assets[$type][$name] = $assetData;
    }

    /**
     * Add CSS
     *
     * @param string           $name
     * @param string           $file
     * @param string|bool      $version           - version number as a string, or true for with automatic versioning.
     * @param int|string|array $priorityOrDepends - priority number or dependent css as string or array. Default: priority 100
     *
     * @return \Lej\Support\Asset
     */
    public function addCss(string $name, string $file, $version = null, $priorityOrDepends = 100)
    {
        $this->addAsset('css', $name, $file, $version, $priorityOrDepends);
        return $this;
    }

    /**
     * Add JS
     *
     * @param string           $name
     * @param string           $file
     * @param string|bool      $version           - version number as a string, or true for with automatic versioning.
     * @param int|string|array $priorityOrDepends - priority number or dependent css as string or array. Default: priority 100
     *
     * @return \Lej\Support\Asset
     */
    public function addJs(string $name, string $file, $version = null, $priorityOrDepends = 100)
    {
        $this->addAsset('js', $name, $file, $version, $priorityOrDepends);
        return $this;
    }

    /**
     * Remove JS
     *
     * @param string $name
     * @return \Lej\Support\Asset
     */
    public function removeJs(string $name)
    {
        unset($this->assets['js'][$name]);
        return $this;
    }

    /**
     * Remove CSS
     *
     * @param string $name
     * @return \Lej\Support\Asset
     */
    public function removeCss(string $name)
    {
        unset($this->assets['css'][$name]);
        return $this;
    }

    /**
     * Get all CSS
     *
     * @param string $name
     * @return string
     */
    private function linkCss(string $name = null)
    {
        return empty($this->assets['css']) ? '' : $this->links('css', $name).PHP_EOL;
    }

    /**
     * Get all JS
     *
     * @param string $name
     * @return string
     */
    private function linkJs(string $name = null)
    {
        return empty($this->assets['js']) ? '' : $this->links('js', $name).PHP_EOL;
    }

    /**
     * Get assets
     *
     * @param string $type
     * @param string $name
     * @param array  $prints
     * @return string
     */
    private function links(string $type, string $name = null, array &$prints = null)
    {
        if (! $name)
            $this->sortAssetsByPriority($type);
        elseif (isset($this->assets[$type][$name]))
            $assets = [$name => $this->assets[$type][$name]];
        else
            return '';

        $html = [];
        foreach (($assets ?? $this->assets[$type]) as $name => $asset)
        {
            if (isset($prints[$name]))
                continue;

            $prints[$name] = true;
            foreach ($asset['depends'] as $depend)
            {
                if (isset($prints[$depend]) || ! isset($this->assets[$type][$depend]))
                    continue;

                $html[] = $this->links($type, $depend, $prints);
            }
            $html[] = $this->getAppend($type, $asset['file'], $asset['version']);
        }

        return $html ? implode(PHP_EOL, $html) : '';
    }

    /**
     * Get append html
     *
     * @param string $type
     * @param string $file
     * @param string|bool $version
     *
     * @return string
     */
    private function getAppend(string $type, string $file, $version = null)
    {
        if (! $file)
            return '';

        $v = '';
        if ($version)
        {
            if (is_string($version))
                $v = '?v='.$version;
            else
            {
                $filePath = public_path($file);
                if (file_exists($filePath))
                    $v = '?v='.@filemtime($filePath);
            }
        }
        $link = asset($file).$v;

        switch ($type)
        {
            case 'js':  return '<script src="' . $link . '"></script>';
            case 'css': return '<link rel="stylesheet" href="' . $link . '" />';

            default: return '';
        }
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

        $this->assets[$type] = Arr::sort($this->assets[$type], function ($v) {
            return $v['priority'];
        });
    }

    /**
     * Check CSS
     *
     * @param string $name
     * @return bool
     */
    public function hasCss(string $name)
    {
        return isset($this->assets['css'][$name]);
    }

    /**
     * Check JS
     *
     * @param string $name
     * @return bool
     */
    public function hasJs(string $name)
    {
        return isset($this->assets['js'][$name]);
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