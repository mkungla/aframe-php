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

use \AframeVR\Core\Entity;
use \AframeVR\Interfaces\EntityInterface;

class Light extends Entity implements EntityInterface
{

    /**
     * Init <a-light>
     *
     * The light primitive adjusts the lighting setup of the scene. It is an entity that maps attributes to properties
     * of the light component.
     * 
     * @return void
     */
    public function reset()
    {
        parent::reset();
        $this->attr('Light');
        
    }

    /**
     * light.angle
     *
     * @param int|float $angle            
     * @return self
     */
    public function angle(float $angle = 60)
    {
        $this->attr('Light')->angle($angle);
        return $this;
    }

    /**
     * light.color
     *
     * @param string $color            
     * @return self
     */
    public function color(string $color = '#fff'): EntityInterface
    {
        $this->attr('Light')->color($color);
        return $this;
    }

    /**
     * light.decay
     *
     * @param int $decay            
     * @return self
     */
    public function decay(int $decay = 1)
    {
        $this->attr('Light')->decay($decay);
        return $this;
    }

    /**
     * light.distance
     *
     * @param float $distance            
     * @return self
     */
    public function distance(float $distance = 0.0)
    {
        $this->attr('Light')->distance($distance);
        return $this;
    }

    /**
     * light.exponent
     *
     * @param float $exponent            
     * @return self
     */
    public function exponent(float $exponent = 10.0)
    {
        $this->attr('Light')->exponent($exponent);
        return $this;
    }

    /**
     * light.groundColor
     *
     * @param string $ground_color            
     * @return self
     */
    public function groundColor(string $ground_color = '#fff')
    {
        $this->attr('Light')->groundColor($ground_color);
        return $this;
    }

    /**
     * light.intensity
     *
     * @param float $intensity            
     * @return self
     */
    public function intensity(float $intensity = 1.0)
    {
        $this->attr('Light')->intensity($intensity);
        return $this;
    }

    /**
     * light.penumbra
     *
     * @param float $penumbra
     * @return self
     */
    public function penumbra(float $penumbra)
    {
        $this->attr('Light')->penumbra($penumbra);
        return $this;
    }
    
    
    /**
     * light.type
     *
     * @param string $type            
     * @return self
     */
    public function type(string $type = 'directional')
    {
        $this->attr('Light')->type($type);
        return $this;
    }
}
