<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 27, 2016 - 5:24:06 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         CircleMethods.php
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

class CircleMethods
{

    /**
     * Radius (in meters) of the circle.
     *
     * @param array $dom_attributes            
     * @param double $radius            
     * @return void
     */
    public function radius(array &$dom_attributes, float $radius)
    {
        $dom_attributes['radius'] = $radius;
    }

    /**
     * Segments
     *
     * CIRCLE: Number of triangles to construct the circle, like pizza slices.
     * A higher number of segments means the circle will be more round.
     *
     * @param array $dom_attributes            
     * @param int $segments            
     * @return void
     */
    public function segments(array &$dom_attributes, int $segments)
    {
        $dom_attributes['segments'] = $segments;
    }

    /**
     * Start angle for first segment.
     * Can be used to define a partial circle.
     *
     * @param array $dom_attributes            
     * @param double $thetaStart            
     * @return void
     */
    public function thetaStart(array &$dom_attributes, float $thetaStart)
    {
        $dom_attributes['thetaStart'] = $thetaStart;
    }

    /**
     * Defaults to 360, which makes for a complete circle.
     *
     * @param array $dom_attributes            
     * @param double $thetaLength            
     * @return void
     */
    public function thetaLength(array &$dom_attributes, float $thetaLength)
    {
        $dom_attributes['thetaLength'] = $thetaLength;
    }
}
