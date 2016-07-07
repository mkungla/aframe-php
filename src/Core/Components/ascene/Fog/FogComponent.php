<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 7, 2016 - 3:05:44 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         FogComponent.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Components\ascene\Fog;

use \AframeVR\Interfaces\Core\Components\ascene\FogCMPTIF;
use \AframeVR\Core\Helpers\ComponentAbstract;

class FogComponent extends ComponentAbstract implements FogCMPTIF
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
        $this->setDomAttribute('fog');
        $this->type();
        $this->color();
        return true;
    }

    /**
     * Fog type
     *
     * Type of fog distribution. Can be linear or exponential.
     *
     * @param string $type
     * @return FogCMPTIF
     */
    public function type(string $type = 'linear'): FogCMPTIF
    {
        $this->dom_attributes['type'] = $type;
        return $this;
    }
    
    /**
     * Fog color
     *
     * Color of fog. For example, if set to black, far away objects will be rendered black.
     *
     * @param string $color
     * @return FogCMPTIF
     */
    public function color(string $color = '#000'): FogCMPTIF
    {
        $this->dom_attributes['color'] = $color;
        return $this;
    }
    
    /**
     * Fog near
     *
     * Minimum distance to start applying fog. Objects closer than this won’t be affected by fog.
     *
     * @param string $near
     * @return FogCMPTIF
     */
    public function near(int $near = 1): FogCMPTIF
    {
        $this->dom_attributes['near'] = $near;
        return $this;
    }
    
    /**
     * Fog far
     *
     * Maximum distance to stop applying fog. Objects farther than this won’t be affected by fog.
     *
     * @param int $far
     * @return FogCMPTIF
     */
    public function far(int $far = 1000): FogCMPTIF
    {
        $this->dom_attributes['far'] = $far;
        return $this;
    }
    
    /**
     * Fog density
     *
     * How quickly the fog grows dense.
     *
     * @param float $density
     * @return FogCMPTIF
     */
    public function density(float $density = 0.00025): FogCMPTIF
    {
        $this->dom_attributes['density'] = $density;
        return $this;
    }
  
}