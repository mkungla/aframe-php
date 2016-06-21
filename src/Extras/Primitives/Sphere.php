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
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Extras\Primitives;

use \AframeVR\Core\Entity;
use \AframeVR\Core\Helpers\MeshAttributes;
use \AframeVR\Interfaces\PrimitiveInterface;

/**
 * <a-sphere>
 *
 * The sphere primitive creates a spherical or polyhedron shapes.
 * It wraps an entity that prescribes the geometry component with its geometric primitive set to sphere.
 */
class Sphere extends Entity implements PrimitiveInterface
{
    use MeshAttributes;

    public function init()
    {
        $this->component('Material');
        $this->component('Geometry')->primitive('sphere');
        
        /* Load defaults */
        $this->defaults();
    }

    public function radius(float $radius = 0.85): Entity
    {
        $this->component('Geometry')->radius($radius);
        return $this;
    }

    public function segmentsHeight($segmentsHeigh = 18)
    {
        $this->component('Geometry')->segmentsHeight($segmentsHeigh);
        return $this;
    }

    public function segmentsWidth($segmentsWidth = 36)
    {
        $this->component('Geometry')->segmentsWidth($segmentsWidth);
        return $this;
    }

    public function defaults()
    {
        $this->radius();
        $this->segmentsHeight();
        $this->segmentsWidth();
    }
}
 