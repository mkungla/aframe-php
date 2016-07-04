<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 4, 2016 - 1:12:05 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         DefaultMethods.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Components\Camera\Methods;

class DefaultMethods
{
    /**
     * Camera active
     *
     * Whether the camera is currently the active camera in a scene with multiple cameras.
     *
     * @param array $dom_attributes 
     * @param bool $active            
     * @return void
     */
    public function active(array &$dom_attributes, bool $active = false)
    {
        $dom_attributes['active'] = $active;
    }

    /**
     * Camera frustum far clipping plane.
     *
     * @param array $dom_attributes 
     * @param int|float $far            
     * @return void
     */
    public function far(array &$dom_attributes, float $far = 10000)
    {
        $dom_attributes['far'] = $far;
    }

    /**
     * Field of view (in degrees).
     *
     * @param array $dom_attributes 
     * @param int $fov            
     * @return void
     */
    public function fov(array &$dom_attributes, int $fov = 80)
    {
        $dom_attributes['fov'] = $fov;
    }

    /**
     * Camera frustum near clipping plane.
     *
     * @param array $dom_attributes 
     * @param float $near            
     * @return void
     */
    public function near(array &$dom_attributes, float $near = 0.5)
    {
        $dom_attributes['near'] = $near;
    }
}
