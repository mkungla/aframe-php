<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 27, 2016 - 6:28:45 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         Config.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core;

final class Config
{

    /**
     * Path to package composer.json
     *
     * @var string|null
     */
    private $config_path;

    /**
     * Array with contents of composer.json
     *
     * @var array|null
     */
    private $cfg_data;

    /**
     * Config vars
     *
     * @var array
     */
    private $config_vars;

    /**
     * Configuration constructor
     */
    public function __construct()
    {
        $this->loadComposerJson();
        $this->defineVars();
    }

    /**
     * Get configuration value by key
     *
     * @param string $prop            
     * @return string|null
     */
    public function get(string $prop)
    {
        return $this->config_vars[$prop] ?? null;
    }

    /**
     * Set configuration value
     *
     * @param string $key            
     * @param mixed $val    
     * @return Config        
     */
    public function set(string $key, $val) : Config
    {
        $this->config_vars[$key] = $val;
        return $this;
    }

    /**
     * Real path to aframe-php composer.json
     *
     * @return string
     */
    protected function getConfigRealPath()
    {
        return $this->config_path ?? $this->config_path = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'composer.json';
    }

    /**
     * Whether config file can be found
     *
     * @return bool
     */
    protected function configExists()
    {
        return file_exists($this->getConfigRealPath());
    }

    /**
     * Load contents of aframe-php cmposer.json
     * and read aframe config
     *
     * @return void
     */
    protected function loadComposerJson()
    {
        if($this->configExists()) {
            $cfg_data       = json_decode(file_get_contents($this->getConfigRealPath()), true);
            $this->cfg_data = $cfg_data['config']['aframe'] ?? null;
        }
    }

    /**
     * Define Configuration constants
     *
     * @return void
     */
    protected function defineVars()
    {
        $this->set('assets_uri', $this->cfg_data['assets_uri'] ?? '/aframe');
        $this->set('cdn_url', $this->cfg_data['cdn_url'] ?? '');
        $this->set('format_output',! empty($this->cfg_data['format_output']) ? true : false);
        $this->set('use_cdn',! empty($this->cfg_data['use_cdn']) ? true : false);
    }
}
