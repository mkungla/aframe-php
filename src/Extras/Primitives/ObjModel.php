<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 7, 2016 - 9:24:33 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         ObjModel.php
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

use \AframeVR\Interfaces\Extras\Primitives\ObjModelPrimitiveIF;
use \AframeVR\Core\Entity;
use \AframeVR\Core\Helpers\MeshAttributes;

/**
 * <a-obj-model>
 *
 * The .OBJ model primitive displays a 3D Wavefront model. It is an entity that maps the src and mtl attributes to the
 * obj-model component’s obj and mtl properties respectively.
 */
final class ObjModel extends Entity implements ObjModelPrimitiveIF
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
    public function obj(string $selector = null): ObjModelPrimitiveIF
    {
        $this->component('ObjModel')->obj($selector);
        return $this;
    }

    /**
     * Selector to mtl
     *
     * Selector to an <a-asset-item> pointing to a .MTL file or an inline path to a .MTL file. Optional if you wish to
     * use the material component instead.
     *
     * @param null|string $selector            
     * @return ObjModelPrimitiveIF
     */
    public function mtl(string $selector = null): ObjModelPrimitiveIF
    {
        $this->component('ObjModel')->mtl($selector);
        return $this;
    }
}