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

use \AframeVR\Core\Entity;
use \AframeVR\Interfaces\EntityInterface;

class Camera extends Entity implements EntityInterface
{

    /**
     * Init <a-camera>
     *
     * The camera primitive places the user somewhere within the scene. It is an entity that prescribes the camera
     * component with mappings to controls-related components.
     *
     * @return void
     */
    public function reset()
    {
        parent::reset();
        $this->child()->entity()->component('Camera');
        $this->active(false);
        $this->far(10000);
        $this->fov(80);
        $this->lookControls(true);
        $this->wasdControls(true);
        $this->near(0.5);
        $this->zoom(1);
    }

    /**
     * camera.active
     *
     * @param bool $active            
     * @return self
     */
    public function active(bool $active): self
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
     * @param float $far            
     * @return self
     */
    public function far(float $far): self
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
     * @param float $fov            
     * @return self
     */
    public function fov(float $fov): self
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
     * @param bool $look_controls            
     * @return self
     */
    public function lookControls(bool $look_controls): self
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
     * @param float $near            
     * @return self
     */
    public function near(float $near): self
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
     * @return self
     */
    public function wasdControls(bool $wasd_controls = true): self
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
     * @return self
     */
    public function zoom(float $zoom): self
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

 