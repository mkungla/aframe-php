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
  
}