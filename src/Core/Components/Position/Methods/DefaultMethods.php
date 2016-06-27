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
namespace AframeVR\Core\Components\Position\Methods;

class DefaultMethods
{

    /**
     * Negative X axis extends left.
     * Positive X Axis extends right.
     *
     * @param array $dom_attributes            
     * @param double $x_axis            
     * @return void
     */
    public function positionX(array &$dom_attributes, float $x_axis)
    {
        $dom_attributes['x'] = $x_axis;
    }

    /**
     * Negative Y axis extends up.
     * Positive Y Axis extends down.
     *
     * @param array $dom_attributes            
     * @param double $y_axis            
     * @return void
     */
    public function positionY(array &$dom_attributes, float $y_axis)
    {
        $dom_attributes['y'] = $y_axis;
    }

    /**
     * Negative Z axis extends in.
     * Positive Z Axis extends out.
     *
     * @param array $dom_attributes            
     * @param double $z_axis            
     * @return void
     */
    public function positionZ(array &$dom_attributes, float $z_axis)
    {
        $dom_attributes['z'] = $z_axis;
    }
}
