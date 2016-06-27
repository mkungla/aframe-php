<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 27, 2016 - 2:54:40 AM
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
namespace AframeVR\Core\Components\Scale\Methods;

class DefaultMethods
{

    /**
     * Roll, rotation about the X-axis.
     *
     * @param array $dom_attributes            
     * @param float|int $scale_x            
     * @return void
     */
    public function scaleX(array &$dom_attributes, float $scale_x)
    {
        $dom_attributes['x'] = $scale_x;
    }

    /**
     * Pitch, rotation about the Y-axis.
     *
     * @param array $dom_attributes            
     * @param float|int $scaling_y            
     * @return void
     */
    public function scaleY(array &$dom_attributes, float $scale_y)
    {
        $dom_attributes['y'] = $scale_y;
    }

    /**
     * Yaw, rotation about the Z-axis.
     *
     * @param array $dom_attributes            
     * @param float|int $scale_z            
     * @return void
     */
    public function scaleZ(array &$dom_attributes, float $scale_z)
    {
        $dom_attributes['z'] = $scale_z;
    }
}
