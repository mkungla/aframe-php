<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 20, 2016 - 10:28:02 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         Primitive.php
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

class Sphere extends Entity implements EntityInterface
{
    /**
     * Init <a-sphere>
     *
     * The sphere primitive creates a spherical or polyhedron shapes.
     * It wraps an entity that prescribes the geometry component with its geometric primitive set to sphere.
     *
     * @return void
     */
    public function reset()
    {
        $this->component('Material');
        $this->component('Geometry')->primitive('sphere');
        
        $this->radius();
        $this->segmentsHeight();
        $this->segmentsWidth();
    }

    /**
     * geometry.radius
     *
     * @param float $radius            
     * @return \AframeVR\Interfaces\Extras\Primitives\SpherePrimitiveIF
     */
    public function radius(float $radius = 0.85): self
    {
        $this->component('Geometry')->radius($radius);
        return $this;
    }

    /**
     * geometry.segmentsHeight
     *
     * @param int $segmentsHeigh            
     * @return self
     */
    public function segmentsHeight($segmentsHeigh = 18): self
    {
        $this->component('Geometry')->segmentsHeight($segmentsHeigh);
        return $this;
    }

    /**
     * geometry.segmentsWidth
     *
     * @param int $segmentsWidth            
     * @return self
     */
    public function segmentsWidth($segmentsWidth = 36): self
    {
        $this->component('Geometry')->segmentsWidth($segmentsWidth);
        return $this;
    }
}
