<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 6, 2016 - 8:47:40 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         Light.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Extras\Primitives;

use \AframeVR\Interfaces\Extras\Primitives\LightPrimitiveIF;
use \AframeVR\Core\Entity;

class Light extends Entity implements LightPrimitiveIF
{

    /**
     * Init
     *
     * {@inheritdoc}
     *
     * @return void
     */
    public function init()
    {
        $this->component('Position');
        $this->component('Light');
    }

    public function defaults()
    {
    }

    /**
     * light.angle
     *
     * {@inheritdoc}
     *
     * @param float $angle            
     * @return LightPrimitiveIF
     */
    public function angle(float $angle = 60): LightPrimitiveIF
    {
        $this->component('Light')->angle($angle);
        return $this;
    }

    /**
     * light.color
     *
     * {@inheritdoc}
     *
     * @param string $color            
     * @return LightPrimitiveIF
     */
    public function color(string $color = '#fff'): LightPrimitiveIF
    {
        $this->component('Light')->color($color);
        return $this;
    }

    /**
     * light.decay
     *
     * {@inheritdoc}
     *
     * @param int $decay            
     * @return LightPrimitiveIF
     */
    public function decay(int $decay = 1): LightPrimitiveIF
    {
        $this->component('Light')->decay($decay);
        return $this;
    }

    /**
     * light.distance
     *
     * {@inheritdoc}
     *
     * @param float $distance            
     * @return LightPrimitiveIF
     */
    public function distance(float $distance = 0.0): LightPrimitiveIF
    {
        $this->component('Light')->distance($distance);
        return $this;
    }

    /**
     * light.exponent
     *
     * {@inheritdoc}
     *
     * @param float $exponent            
     * @return LightPrimitiveIF
     */
    public function exponent(float $exponent = 10.0): LightPrimitiveIF
    {
        $this->component('Light')->exponent($exponent);
        return $this;
    }

    /**
     * light.groundColor
     *
     * {@inheritdoc}
     *
     * @param string $ground_color            
     * @return LightPrimitiveIF
     */
    public function groundColor(string $ground_color = '#fff'): LightPrimitiveIF
    {
        $this->component('Light')->groundColor($ground_color);
        return $this;
    }

    /**
     * light.intensity
     *
     * {@inheritdoc}
     *
     * @param float $intensity            
     * @return LightPrimitiveIF
     */
    public function intensity(float $intensity = 1.0): LightPrimitiveIF
    {
        $this->component('Light')->intensity($intensity);
        return $this;
    }

    /**
     * light.type
     *
     * {@inheritdoc}
     *
     * @param string $type            
     * @return LightPrimitiveIF
     */
    public function type(string $type = 'directional'): LightPrimitiveIF
    {
        $this->component('Light')->type($type);
        return $this;
    }
}