<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 7, 2016 - 9:23:01 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         ObjModelPrimitiveIF.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Interfaces\Extras\Primitives;

use \AframeVR\Interfaces\PrimitiveInterface;

interface ObjModelPrimitiveIF extends PrimitiveInterface
{

    /**
     * Selector to obj
     *
     * Selector to an <a-asset-item> pointing to a .OBJ file or an inline path to a .OBJ file.
     *
     * @param null|string $selector            
     * @return ObjModelCMPTIF
     */
    public function obj(string $selector = null): ObjModelPrimitiveIF;

    /**
     * Selector to mtl
     *
     * Selector to an <a-asset-item> pointing to a .MTL file or an inline path to a .MTL file. Optional if you wish to
     * use the material component instead.
     *
     * @param null|string $selector            
     * @return ObjModelCMPTIF
     */
    public function mtl(string $selector = null): ObjModelPrimitiveIF;
}