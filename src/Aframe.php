<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 20, 2016 - 8:45:32 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         Aframe.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR;

use \AframeVR\Core\{
    Config,
    Scene
};

final class Aframe
{

    /**
     * A-Frame Scenes
     *
     * All scenes will be in this array as Scene objects with index of custom identifier.
     *
     * @var $scenes
     */
    private $scenes;

    private $configObj;

    /**
     * Constructor
     */
    public function __construct()
    {
        /* We will have scenes in array */
        $this->scenes = array();
    }

    public function config()
    {
        return $this->configObj ?? $this->configObj = new Config();
    }

    /**
     * Scene
     *
     * Work with untitled scene or scene by name
     *
     * @param string $name            
     * @return Scene
     */
    public function scene(string $name = 'untitled'): Scene
    {
        return $this->scenes[$name] ?? $this->scenes[$name] = new Scene($name);
    }
}
 