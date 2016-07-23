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
 * File         CameraCMPTIF.php
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
 * Camera Component Interface
 *
 * The camera component defines from which perspective the user views the scene.
 * It is often paired with controls-related components that allow user input to move and rotate the camera.
 * When the active property is toggled, the component will notify the camera system
 * to change the current camera used by the renderer.
 */
interface CameraCMPTIF extends ComponentInterface
{

    /**
     * Camera active
     *
     * Whether the camera is currently the active camera in a scene with multiple cameras.
     *
     * @param bool $active
     * @return CameraCMPTIF
     */
    public function active(bool $active): CameraCMPTIF;

    /**
     * Camera frustum far clipping plane.
     *
     * @param float $far
     * @return CameraCMPTIF
     */
    public function far(float $far): CameraCMPTIF;

    /**
     * Field of view (in degrees).
     *
     * @param float $fov
     * @return CameraCMPTIF
     */
    public function fov(float $fov): CameraCMPTIF;

    /**
     * Camera frustum near clipping plane.
     *
     * @param float $near
     * @return CameraCMPTIF
     */
    public function near(float $near): CameraCMPTIF;

    /**
     * Camera zoom
     *
     * @param float $zoom
     * @return CameraCMPTIF
     */
    public function zoom(float $zoom): CameraCMPTIF;
}