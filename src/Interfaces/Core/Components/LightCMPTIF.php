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
     * @return LightCMPTIF
     */
    public function type(string $type = 'directional'): LightCMPTIF;

    /**
     * Light color
     *
     * @param string $color            
     * @return LightCMPTIF
     */
    public function color(string $color = '#fff'): LightCMPTIF;

    /**
     * Light angle
     *
     * Maximum extent of spot light from its direction (in degrees).
     *
     * @param float $angle            
     * @return LightCMPTIF
     */
    public function angle(float $angle = 60): LightCMPTIF;

    /**
     * Amount the light dims along the distance of the light.
     *
     * @param int $decay            
     * @return LightCMPTIF
     */
    public function decay(int $decay = 1): LightCMPTIF;

    /**
     * Light distance
     *
     * Distance where intensity becomes 0. If distance is 0, then the point light does not decay with distance.
     *
     * @param float $distance            
     * @return LightCMPTIF
     */
    public function distance(float $distance = 0.0): LightCMPTIF;

    /**
     * falloff
     *
     * Rapidity of falloff of light from its target direction.
     *
     * @param float $exponent            
     * @return LightCMPTIF
     */
    public function exponent(float $exponent = 10.0): LightCMPTIF;

    /**
     * Light color from below.
     *
     * @param string $ground_color            
     * @return LightCMPTIF
     */
    public function groundColor(string $ground_color = '#fff'): LightCMPTIF;

    /**
     * Light strength.
     *
     * @param float $intensity            
     * @return LightCMPTIF
     */
    public function intensity(float $intensity = 1.0): LightCMPTIF;
}