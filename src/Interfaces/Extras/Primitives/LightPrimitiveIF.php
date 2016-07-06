<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 6, 2016 - 8:50:12 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         LightPrimitiveIF.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Interfaces\Extras\Primitives;

use \AframeVR\Interfaces\PrimitiveInterface;

interface LightPrimitiveIF extends PrimitiveInterface
{

    /**
     * light.angle
     *
     * @param int|float $angle            
     * @return LightPrimitiveIF
     */
    public function angle(float $angle = 60): LightPrimitiveIF;

    /**
     * light.color
     *
     * @param string $color            
     * @return LightPrimitiveIF
     */
    public function color(string $color = '#fff'): LightPrimitiveIF;

    /**
     * light.decay
     *
     * @param int $decay            
     * @return LightPrimitiveIF
     */
    public function decay(int $decay = 1): LightPrimitiveIF;

    /**
     * light.distance
     *
     * @param float $distance            
     * @return LightPrimitiveIF
     */
    public function distance(float $distance = 0.0): LightPrimitiveIF;

    /**
     * light.exponent
     *
     * @param float $exponent            
     * @return LightPrimitiveIF
     */
    public function exponent(float $exponent = 10.0): LightPrimitiveIF;

    /**
     * light.groundColor
     *
     * @param string $ground_color            
     * @return LightPrimitiveIF
     */
    public function groundColor(string $ground_color = '#fff'): LightPrimitiveIF;

    /**
     * light.intensity
     *
     * @param float $intensity            
     * @return LightPrimitiveIF
     */
    public function intensity(float $intensity = 1.0): LightPrimitiveIF;

    /**
     * light.type
     *
     * @param string $type            
     * @return LightPrimitiveIF
     */
    public function type(string $type = 'directional'): LightPrimitiveIF;
}
