<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 4, 2016 - 1:16:14 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         CameraComponent.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Components\Camera;

use \AframeVR\Interfaces\Core\Components\Camera\CameraInterface;
use \AframeVR\Core\Helpers\ComponentAbstract;

class CameraComponent extends ComponentAbstract implements CameraInterface
{
    /**
     * Initialize Component
     *
     * {@inheritdoc}
     *
     * @return bool
     */
    public function initializeComponent(): bool
    {
        $this->setDomAttribute('camera');
        return true;
    }
    
    /**
     * Camera active
     *
     * Whether the camera is currently the active camera in a scene with multiple cameras.
     *
     * @param bool $active
     * @return void
     */
    public function active(bool $active = false)
    {
        $this->dom_attributes['active'] = $active;
    }
    
    /**
     * Camera frustum far clipping plane.
     *
     * @param int|float $far
     * @return void
     */
    public function far(float $far = 10000)
    {
        $this->dom_attributes['far'] = $far;
    }
    
    /**
     * Field of view (in degrees).
     *
     * @param int $fov
     * @return void
     */
    public function fov(int $fov = 80)
    {
        $this->dom_attributes['fov'] = $fov;
    }
    
    /**
     * Camera frustum near clipping plane.
     *
     * @param float $near
     * @return void
     */
    public function near(float $near = 0.5)
    {
        $this->dom_attributes['near'] = $near;
    }
    
    /**
     * Camera zoom
     *
     * @param int|float $zoom
     * @return void
     */
    public function zoom(float $zoom = 1)
    {
        $this->dom_attributes['zoom'] = $zoom;
    }
}