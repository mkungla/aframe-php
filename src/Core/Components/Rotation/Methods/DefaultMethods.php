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
namespace AframeVR\Core\Components\Rotation\Methods;

class DefaultMethods
{

    /**
     * Roll, rotation about the X-axis.
     *
     * @param array $dom_attributes            
     * @param float|int $roll            
     * @return void
     */
    public function roll(array &$dom_attributes, float $roll)
    {
        $dom_attributes['x'] = $roll;
    }

    /**
     * Pitch, rotation about the Y-axis.
     *
     * @param array $dom_attributes            
     * @param float|int $pitch            
     * @return void
     */
    public function pitch(array &$dom_attributes, float $pitch)
    {
        $dom_attributes['y'] = $pitch;
    }

    /**
     * Yaw, rotation about the Z-axis.
     *
     * @param array $dom_attributes            
     * @param float|int $yaw            
     * @return void
     */
    public function yaw(array &$dom_attributes, float $yaw)
    {
        $dom_attributes['z'] = $yaw;
    }
}
