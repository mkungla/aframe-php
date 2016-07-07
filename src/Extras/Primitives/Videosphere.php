<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 7, 2016 - 4:51:28 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         Videosphere.php
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

use \AframeVR\Interfaces\Extras\Primitives\VideospherePrimitiveIF;
use \AframeVR\Core\Entity;
use \AframeVR\Core\Helpers\MeshAttributes;

class Videosphere extends Entity implements VideospherePrimitiveIF
{
    use MeshAttributes;

    /**
     * Init <a-sphere>
     *
     * The sphere primitive creates a spherical or polyhedron shapes.
     * It wraps an entity that prescribes the geometry component with its geometric primitive set to sphere.
     *
     * {@inheritdoc}
     *
     * @return void
     */
    public function init()
    {
        /* Load defaults */
        $this->defaults();
    }

    /**
     * Set defaults
     *
     * {@inheritdoc}
     *
     * @return void
     */
    public function defaults()
    {
        $this->component('Material')->shader('flat');
        $this->color('#FFF');
        
        $this->component('Geometry')->primitive('sphere');
        $this->component('Geometry')->radius(5000);
        $this->component('Geometry')->segmentsWidth(64);
        $this->component('Geometry')->segmentsWidth(20);
        
        $this->scale(-1, 1, 1);
    }

    /**
     * geometry.radius
     *
     * {@inheritdoc}
     *
     * @param float $radius            
     * @return VideospherePrimitiveIF
     */
    public function radius(float $radius = 100): VideospherePrimitiveIF
    {
        $this->component('Geometry')->radius($radius);
        return $this;
    }

    /**
     * Autoplay video
     *
     * @param bool $autoplay
     * @return AssetVideoInterface
     */
    public function autoplay(bool $autoplay = true): VideospherePrimitiveIF
    {
        $this->attrs['autoplay'] = $autoplay ? 'true' : 'false';
        return $this;
    }
    
    /**
     * geometry.segmentsHeight
     *
     * {@inheritdoc}
     *
     * @param int $segmentsHeigh            
     * @return VideospherePrimitiveIF
     */
    public function segmentsHeight($segmentsHeigh = 64): VideospherePrimitiveIF
    {
        $this->component('Geometry')->segmentsHeight($segmentsHeigh);
        return $this;
    }

    /**
     * geometry.segmentsWidth
     *
     * {@inheritdoc}
     *
     * @param int $segmentsWidth            
     * @return VideospherePrimitiveIF
     */
    public function segmentsWidth($segmentsWidth = 64): VideospherePrimitiveIF
    {
        $this->component('Geometry')->segmentsWidth($segmentsWidth);
        return $this;
    }
}
