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
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Extras\Primitives;

use \AframeVR\Interfaces\Extras\Primitives\CameraPrimitiveIF;
use \AframeVR\Core\Entity;

class Camera extends Entity implements CameraPrimitiveIF
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
        $this->child()->entity()->component('Camera');
        $this->far();
        $this->fov();
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
     * @return CameraPrimitiveIF
     */
    public function active(bool $active = false): CameraPrimitiveIF
    {
        $this->child()
            ->entity()
            ->component('Camera')
            ->active($active);
        return $this;
    }

    /**
     * camera.far
     *
     * {@inheritdoc}
     *
     * @param int|float $far            
     * @return CameraPrimitiveIF
     */
    public function far(float $far = 10000): CameraPrimitiveIF
    {
        $this->child()
            ->entity()
            ->component('Camera')
            ->far($far);
        return $this;
    }

    /**
     * camera.fov
     *
     * {@inheritdoc}
     *
     * @param int|float $fov            
     * @return CameraPrimitiveIF
     */
    public function fov(float $fov = 80): CameraPrimitiveIF
    {
        $this->child()
            ->entity()
            ->component('Camera')
            ->fov($fov);
        return $this;
    }

    /**
     * look-controls.enabled
     *
     * {@inheritdoc}
     *
     * @param bool $look_controls            
     * @return CameraPrimitiveIF
     */
    public function lookControls(bool $look_controls = true): CameraPrimitiveIF
    {
        $this->child()
            ->entity()
            ->component('LookControls')
            ->enabled($look_controls);
        return $this;
    }

    /**
     * camera.near
     *
     * {@inheritdoc}
     *
     * @param float $near            
     * @return CameraPrimitiveIF
     */
    public function near(float $near = 0.5): CameraPrimitiveIF
    {
        $this->child()
            ->entity()
            ->component('Camera')
            ->near($near);
        return $this;
    }

    /**
     * wasd-controls.enabled
     *
     * {@inheritdoc}
     *
     * @param bool $wasd_controls            
     * @return CameraPrimitiveIF
     */
    public function wasdControls(bool $wasd_controls = true): CameraPrimitiveIF
    {
        $this->child()
            ->entity()
            ->component('WASDControls')
            ->enabled($wasd_controls);
        return $this;
    }

    /**
     * camera.zoom
     *
     * {@inheritdoc}
     *
     * @param int|float $zoom            
     * @return CameraPrimitiveIF
     */
    public function zoom(float $zoom = 1): CameraPrimitiveIF
    {
        $this->child()
            ->entity()
            ->component('Camera')
            ->zoom($zoom);
        return $this;
    }

    /**
     * Camera child cursor entity
     * 
     * @return \AframeVR\Interfaces\Core\Components\CursorCMPTIF
     */
    public function cursor()
    {
        return $this->child()
            ->entity()
            ->child()
            ->cursor();
    }
}

 