<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 4, 2016 - 1:31:08 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         Camera.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Extras\Primitives;

use \AframeVR\Interfaces\Extras\Primitives\CameraInterface;
use \AframeVR\Core\Entity;
use \AframeVR\Core\Helpers\MeshAttributes;

class Camera extends Entity implements CameraInterface
{
    /**
     * Init <a-box>
     *
     * The box primitive, formerly called <a-cube>, creates shapes such as boxes, cubes, or walls.
     * It is an entity that prescribes the geometry with its geometric primitive set to box.
     *
     * {@inheritdoc}
     *
     * @return void
     */
    public function init()
    {
        $this->entity()->component('Camera');
        $this->lookControls(true);
        $this->wasdControls(true);
    }

    /**
     * Set defaults
     *
     * {@inheritdoc}
     *
     * @return void
     */
    public function defaults()
    {
    }

    /**
     * camera.active
     *
     * {@inheritdoc}
     *
     * @param bool $active
     * @return CameraInterface
     */
    public function active(bool $active = false): CameraInterface
    {
        $this->entity()->component('Camera')->active($active);
        return $this;
    }
    
    /**
     * camera.far
     *
     * {@inheritdoc}
     *
     * @param int|float $far
     * @return CameraInterface
     */
    public function far(float $far = 10000): CameraInterface
    {
        $this->entity()->component('Camera')->far($far);
        return $this;
    }
    
    /**
     * camera.fov
     *
     * {@inheritdoc}
     *
     * @param int|float $fov
     * @return CameraInterface
     */
    public function fov(float $fov = 10000): CameraInterface
    {
        $this->entity()->component('Camera')->fov($fov);
        return $this;
    }

    /**
     * look-controls.enabled
     *
     * {@inheritdoc}
     *
     * @param bool $look_controls
     * @return CameraInterface
     */
    public function lookControls(bool $look_controls = true): CameraInterface
    {
        $this->entity()->component('LookControls')->enabled($look_controls);
        return $this;
    }
    
    /**
     * camera.near
     *
     * {@inheritdoc}
     *
     * @param int|float $near
     * @return CameraInterface
     */
    public function near(float $near = 0.5): CameraInterface
    {
        $this->entity()->component('Camera')->near($near);
        return $this;
    }
    
    /**
     * wasd-controls.enabled
     *
     * {@inheritdoc}
     *
     * @param bool $wasd_controls
     * @return CameraInterface
     */
    public function wasdControls(bool $wasd_controls = true): CameraInterface
    {
        $this->entity()->component('WASDControls')->enabled($wasd_controls);
        return $this;
    }
    
    /**
     * camera.zoom
     * 
     * {@inheritdoc}
     * 
     * @param int|float $zoom
     * @return CameraInterface
     */
    public function zoom(float $zoom = 1): CameraInterface
    {
        $this->entity()->component('Camera')->zoom($zoom);
        return $this;
    }
}

 