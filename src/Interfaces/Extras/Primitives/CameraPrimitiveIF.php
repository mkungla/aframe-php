<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 4, 2016 - 1:47:45 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         CameraPrimitiveIF.php
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

interface CameraPrimitiveIF extends PrimitiveInterface
{

    /**
     * camera.active
     *
     * @param bool $active            
     * @return CameraPrimitiveIF
     */
    public function active(bool $active = false): CameraPrimitiveIF;

    /**
     * camera.far
     *
     * @param int|float $far            
     * @return CameraPrimitiveIF
     */
    public function far(float $far = 10000): CameraPrimitiveIF;

    /**
     * camera.fov
     *
     * @param int|float $fov            
     * @return CameraPrimitiveIF
     */
    public function fov(float $fov = 10000): CameraPrimitiveIF;

    /**
     * look-controls.enabled
     *
     * @param bool $look_controls            
     * @return CameraPrimitiveIF
     */
    public function lookControls(bool $look_controls = true): CameraPrimitiveIF;

    /**
     * camera.near
     *
     * @param float $near            
     * @return CameraPrimitiveIF
     */
    public function near(float $near = 0.5): CameraPrimitiveIF;

    /**
     * wasd-controls.enabled
     *
     * @param bool $wasd_controls            
     * @return CameraPrimitiveIF
     */
    public function wasdControls(bool $wasd_controls = true): CameraPrimitiveIF;

    /**
     * camera.zoom
     *
     * @param int|float $zoom            
     * @return CameraPrimitiveIF
     */
    public function zoom(float $zoom = 1): CameraPrimitiveIF;
}
