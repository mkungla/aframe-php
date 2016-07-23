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
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Components\Camera;

use \AframeVR\Interfaces\Core\Components\CameraCMPTIF;
use \AframeVR\Core\Helpers\ComponentAbstract;

class CameraComponent extends ComponentAbstract implements CameraCMPTIF
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
        $this->active(true);
        $this->far(10000);
        $this->fov(80);
        $this->near(0.5);
        $this->zoom(1);
        return true;
    }

    /**
     * Camera active
     *
     * {@inheritdoc}
     *
     * @param bool $active
     * @return CameraCMPTIF
     */
    public function active(bool $active = false): CameraCMPTIF
    {
        $this->dom_attributes['active'] = $active ? 'true' : 'false';
        return $this;
    }

    /**
     * Camera frustum far clipping plane.
     *
     * {@inheritdoc}
     *
     * @param float $far
     * @return CameraCMPTIF
     */
    public function far(float $far): CameraCMPTIF
    {
        $this->dom_attributes['far'] = $far;
        return $this;
    }

    /**
     * Field of view (in degrees).
     *
     * {@inheritdoc}
     *
     * @param float $fov
     * @return CameraCMPTIF
     */
    public function fov(float $fov): CameraCMPTIF
    {
        $this->dom_attributes['fov'] = $fov;
        return $this;
    }

    /**
     * Camera frustum near clipping plane.
     *
     * {@inheritdoc}
     *
     * @param float $near
     * @return CameraCMPTIF
     */
    public function near(float $near): CameraCMPTIF
    {
        $this->dom_attributes['near'] = $near;
        return $this;
    }

    /**
     * Camera zoom
     *
     * {@inheritdoc}
     *
     * @param float $zoom
     * @return CameraCMPTIF
     */
    public function zoom(float $zoom): CameraCMPTIF
    {
        $this->dom_attributes['zoom'] = $zoom;
        return $this;
    }
}