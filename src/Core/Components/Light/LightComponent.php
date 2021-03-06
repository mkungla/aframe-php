<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 6, 2016 - 9:12:58 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         LightComponent.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Components\Light;

use \AframeVR\Interfaces\Core\Components\LightCMPTIF;
use \AframeVR\Core\Helpers\ComponentAbstract;

class LightComponent extends ComponentAbstract implements LightCMPTIF
{

    /**
     * Initialize Component
     *
     * {@inheritdoc}
     *
     * @return bool
     */
    public function initializeComponent(): bool
    {
        $this->setDomAttribute('light');
        return true;
    }

    /**
     * Light type
     *
     * One of ambient, directional, hemisphere, point, spot.
     *
     * @param string $type            
     * @return LightCMPTIF
     */
    public function type(string $type = 'directional'): LightCMPTIF
    {
        $this->dom_attributes['type'] = $type;
        return $this;
    }

    /**
     * Light color
     *
     * @param string $color            
     * @return LightCMPTIF
     */
    public function color(string $color = '#fff'): LightCMPTIF
    {
        $this->dom_attributes['color'] = $color;
        return $this;
    }

    /**
     * Light angle
     *
     * Maximum extent of spot light from its direction (in degrees).
     *
     * @param int|float $angle            
     * @return LightCMPTIF
     */
    public function angle(float $angle = 60): LightCMPTIF
    {
        $this->dom_attributes['angle'] = $angle;
        return $this;
    }

    /**
     * Amount the light dims along the distance of the light.
     *
     * @param int $decay            
     * @return LightCMPTIF
     */
    public function decay(int $decay = 1): LightCMPTIF
    {
        $this->dom_attributes['decay'] = $decay;
        return $this;
    }

    /**
     * Light distance
     *
     * Distance where intensity becomes 0. If distance is 0, then the point light does not decay with distance.
     *
     * @param float $distance            
     * @return LightCMPTIF
     */
    public function distance(float $distance = 0.0): LightCMPTIF
    {
        $this->dom_attributes['distance'] = $distance;
        return $this;
    }

    /**
     * falloff
     *
     * Rapidity of falloff of light from its target direction.
     *
     * @param float $exponent            
     * @return LightCMPTIF
     */
    public function exponent(float $exponent = 10.0): LightCMPTIF
    {
        $this->dom_attributes['exponent'] = $exponent;
        return $this;
    }

    /**
     * Light color from below.
     *
     * @param string $ground_color            
     * @return LightCMPTIF
     */
    public function groundColor(string $ground_color = '#fff'): LightCMPTIF
    {
        $this->dom_attributes['groundColor'] = $ground_color;
        return $this;
    }

    /**
     * Light strength.
     *
     * @param float $intensity            
     * @return LightCMPTIF
     */
    public function intensity(float $intensity = 1.0): LightCMPTIF
    {
        $this->dom_attributes['intensity'] = $intensity;
        return $this;
    }
    
    /**
     * Light penumbra
     *
     * @param float $penumbra
     * @return self
     */
    public function penumbra(float $penumbra)
    {
        $this->dom_attributes['penumbra'] = $penumbra;
        return $this;
    }
}
