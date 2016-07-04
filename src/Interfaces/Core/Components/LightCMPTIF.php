<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 4, 2016 - 10:07:13 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         LightCMPTIF.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Interfaces\Core\Components;

use \AframeVR\Interfaces\ComponentInterface;

/**
 * Light Component Interface
 *
 * The light component defines the entity as a source of light. Light affects all materials that have not specified a
 * flat shading model with shader: flat. Note that lights are computationally expensive and the number of lights in a
 * scene should be limited.
 *
 * By default, A-Frame scenes inject default lighting, an ambient light and a directional light. These default lights
 * are visible in the DOM with the data-aframe-default-light attribute. Whenever any lights are added, the default
 * lights are removed from the scene.
 */
interface LightCMPTIF extends ComponentInterface
{

    /**
     * Light type
     *
     * One of ambient, directional, hemisphere, point, spot.
     *
     * @param string $type            
     * @return void
     */
    public function type(string $type = 'directional');

    /**
     * Light color
     *
     * @param string $color            
     * @return void
     */
    public function color(string $color = '#fff');
}