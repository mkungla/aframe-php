<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 29, 2016 - 10:08:27 AM
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
namespace AframeVR\Interfaces\Core\Components\Camera;

use \AframeVR\Interfaces\ComponentInterface;

interface CameraInterface extends ComponentInterface
{

    /**
     * Camera active
     *
     * Whether the camera is currently the active camera in a scene with multiple cameras.
     *
     * @param bool $active            
     * @return void
     */
    public function active(bool $active = false);

    /**
     * Camera frustum far clipping plane.
     *
     * @param int|float $far            
     * @return void
     */
    public function far(float $far = 10000);

    /**
     * Field of view (in degrees).
     *
     * @param int $fov            
     * @return void
     */
    public function fov(int $fov = 80);

    /**
     * Camera frustum near clipping plane.
     *
     * @param float $near            
     * @return void
     */
    public function near(float $near = 0.5);
    
    /**
     * Camera zoom
     *
     * @param float $zoom
     * @return void
     */
    public function zoom(float $zoom = 1);
}