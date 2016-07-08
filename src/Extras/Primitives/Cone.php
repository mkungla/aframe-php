<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 8, 2016 - 3:16:33 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         Cone.php
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
use \AframeVR\Core\Helpers\MeshAttributes;
use \AframeVR\Interfaces\PrimitiveInterface;

/**
 * <a-cone>
 *
 * The cone primitive creates a cone shape. It is an entity that prescribes the geometry with its geometric primitive
 * set to cone.
 */
final class Cone extends Entity implements PrimitiveInterface
{
    
    use MeshAttributes;

    /**
     * Selector to obj
     *
     * Selector to an <a-asset-item> pointing to a .OBJ file or an inline path to a .OBJ file.
     *
     * @return ObjModelPrimitiveIF
     */
    public function init()
    {
        $this->component('Geometry')->primitive('cone');
        $this->component('Geometry')->height(1);
        $this->component('Geometry')->openEnded(false);
        $this->component('Geometry')->radiusBottom(1);
        $this->component('Geometry')->radiusTop(.8);
        $this->component('Geometry')->segmentsHeight(18);
        $this->component('Geometry')->segmentsRadial(36);
        $this->component('Geometry')->thetaLength(360);
        $this->component('Geometry')->thetaStart(0);
        return $this;
    }
}