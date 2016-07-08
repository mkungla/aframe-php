<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 27, 2016 - 4:21:09 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         BoxMethods.php
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

class BoxMethods
{

    /**
     * The box primitive defines boxes (i.e., any quadilateral, not just cubes).
     */
    const DEFAULTS = array(
        /* Width (in meters) of the sides on the X axis. */
        'width' => 1,
        /* Height (in meters) of the sides on the Y axis. */
        'height' => 1,
        /* Depth (in meters) of the sides on the Z axis. */
        'depth' => 1
    );

    /**
     * Depth (in meters) of the sides on the Z axis.
     *
     * @param array $dom_attributes            
     * @param double $depth            
     * @return void
     */
    public function depth(array &$dom_attributes, float $depth)
    {
        $dom_attributes['depth'] = $depth;
    }

    /**
     * Height (in meters) of the sides on the Y axis.
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
     * Width (in meters) of the sides on the X axis.
     *
     * @param array $dom_attributes            
     * @param double $width            
     * @return void
     */
    public function width(array &$dom_attributes, float $width)
    {
        $dom_attributes['width'] = $width;
    }
    
    /**
     * segmentsHeight
     * 
     * @param array $dom_attributes
     * @param number $int
     */
    public function segmentsHeight(array &$dom_attributes, $int = 0)
    {
        $dom_attributes['segmentsHeight'] = $int;
    }
    
    /**
     * segmentsWidth
     * 
     * @param array $dom_attributes
     * @param number $int
     */
    public function segmentsWidth(array &$dom_attributes, $int = 0)
    {
        $dom_attributes['segmentsWidth'] = $int;
    }
    
    /**
     * segmentsDepth
     * 
     * @param array $dom_attributes
     * @param number $int
     */
    public function segmentsDepth(array &$dom_attributes, $int = 0)
    {
        $dom_attributes['segmentsDepth'] = $int;
    }
}
