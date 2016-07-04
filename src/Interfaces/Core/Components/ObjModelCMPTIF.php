<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 4, 2016 - 10:18:11 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         ObjModelCMPTIF.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Interfaces\Core\Components;

use \AframeVR\Interfaces\ComponentInterface;

/**
 * Object Model Component Interface (obj-model)
 *
 * The obj-model component loads a 3D model and material using a Wavefront (.OBJ) file and a .MTL file.
 */
interface ObjModelCMPTIF extends ComponentInterface
{

    /**
     * Selector to obj
     *
     * Selector to an <a-asset-item> pointing to a .OBJ file or an inline path to a .OBJ file.
     *
     * @param string $selector            
     * @return void
     */
    public function obj(string $selector);

    /**
     * Selector to mtl
     *
     * Selector to an <a-asset-item> pointing to a .MTL file or an inline path to a .MTL file. Optional if you wish to
     * use the material component instead.
     *
     * @param string $selector            
     * @return void
     */
    public function mtl(string $selector);
}