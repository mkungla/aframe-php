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

use \AframeVR\Core\Entity;
use \AframeVR\Interfaces\EntityInterface;

final class ObjModel extends Entity implements EntityInterface
{
    /**
     * Init <a-obj-model>
     *
     * The obj-model component loads a 3D model and material using a Wavefront (.OBJ) file and a .MTL file.
     * 
     * @return void
     */
    public function reset()
    {
        parent::reset();
    }
    
    /**
     * Selector to obj
     *
     * Selector to an <a-asset-item> pointing to a .OBJ file or an inline path to a .OBJ file.
     *
     * @param string $selector            
     * @return self
     */
    public function obj(string $selector): self
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
     * @param string $selector            
     * @return self
     */
    public function mtl(string $selector): self
    {
        $this->component('ObjModel')->mtl($selector);
        return $this;
    }
}