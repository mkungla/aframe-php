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
 ^ @issues      https://github.com/mkungla/aframe-php/issues
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
     * The circle primitive defines two-dimensional circles,
     * which can be complete circles or partial circles (like Pac-Man).
     * Note that because it is flat, only a single side of the circle will be rendered
     * if “side: double” is not specified on the material component.
     */
    const DEFAULTS = array(
        /* Radius (in meters) of the circle. */
        'radius' => 1,
        /* Number of triangles to construct the circle, like pizza slices. 
         * A higher number of segments means the circle will be more round. */
        'segments' => 32,
        /* Start angle for first segment. Can be used to define a partial circle. */
        'thetaStart' => 0,
        /* The central angle (in degrees). Defaults to 360, which makes for a complete circle. */
        'thetaLength' => 360
    );

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
