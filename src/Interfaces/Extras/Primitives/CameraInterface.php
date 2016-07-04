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
 * File         CameraInterface.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Interfaces\Extras\Primitives;

use \AframeVR\Interfaces\PrimitiveInterface;

interface CameraInterface extends PrimitiveInterface
{
    /**
     * camera.active
     *
     * @param bool $active
     * @return CameraInterface
     */
    public function active(bool $active = false): CameraInterface;
    
    /**
     * camera.far
     *
     * @param int|float $far
     * @return CameraInterface
     */
    public function far(float $far = 10000): CameraInterface;
    
    /**
     * camera.fov
     *
     * @param int|float $fov
     * @return CameraInterface
     */
    public function fov(float $fov = 10000): CameraInterface;

    /**
     * look-controls.enabled
     *
     * @param bool $look_controls
     * @return CameraInterface
     */
    public function lookControls(bool $look_controls = true): CameraInterface;
    
    /**
     * camera.near
     *
     * @param int|float $near
     * @return CameraInterface
     */
    public function near(float $near = 0.5): CameraInterface;
    
    /**
     * wasd-controls.enabled
     *
     * @param bool $wasd_controls
     * @return CameraInterface
     */
    public function wasdControls(bool $wasd_controls = true): CameraInterface;
}
