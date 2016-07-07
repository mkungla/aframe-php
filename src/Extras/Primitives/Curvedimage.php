<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 7, 2016 - 9:46:02 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         Curvedimage.php
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

use \AframeVR\Interfaces\Extras\Primitives\CurvedimagePrimitiveIF;
use \AframeVR\Core\Entity;
use \AframeVR\Core\Helpers\MeshAttributes;

/**
 * <a-obj-model>
 *
 * The .OBJ model primitive displays a 3D Wavefront model. It is an entity that maps the src and mtl attributes to the
 * obj-model component’s obj and mtl properties respectively.
 */
final class Curvedimage extends Entity implements CurvedimagePrimitiveIF
{
    
    use MeshAttributes;

    /**
     * Selector to obj
     *
     * Selector to an <a-asset-item> pointing to a .OBJ file or an inline path to a .OBJ file.
     *
     * @param null|string $selector            
     * @return ObjModelPrimitiveIF
     */
    public function init()
    {
        $this->component('Geometry')->primitive('cylinder');
        $this->component('Geometry')->height(1);
        $this->component('Geometry')->radius(2);
        $this->component('Geometry')->segmentsRadial(48);
        $this->component('Geometry')->thetaLength(270);
        $this->component('Geometry')->openEnded(true);
        $this->component('Geometry')->thetaStart(0);
        
        $this->component('Material')->shader('flat');
        $this->color('#fff');
        $this->component('Material')->side('double');
        $this->component('Material')->transparent(true);

        $this->component('Material')
        ->shader()
        ->repeat(-1, 1);
        return $this;
    }

}