<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 27, 2016 - 4:42:18 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         PlaneMethods.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Components\Geometry\Methods;

class PlaneMethods
{
    /**
     * Height along the Y axis.
     *
     * @param array $dom_attributes            
     * @param double $height            
     * @return void
     */
    public function height(array &$dom_attributes, float $height)
    {
        $dom_attributes['height'] = $height;
    }

    /**
     * Width along the X axis.
     *
     * @param array $dom_attributes            
     * @param double $width            
     * @return void
     */
    public function width(array &$dom_attributes, float $width)
    {
        $dom_attributes['width'] = $width;
    }
}
