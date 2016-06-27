<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 27, 2016 - 5:45:05 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         RingMethods.php
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

class RingMethods
{

    /**
     * The ring geometry defines a flat ring, like a CD.
     * Note that because it is flat,
     * only a single side of the ring will be rendered if side: double is not specified on the material component.
     */
    const DEFAULTS = array(
        /* Radius of the inner hole of the ring. */
        'radiusInner' => 1,
        /* Radius of the outer edge of the ring. */
        'radiusOuter' => 1,
        /* Number of segments. A higher number means the ring will be more round */
        'segmentsTheta' => 32,
        /* Number of triangles within each face defined by segmentsTheta. */
        'segmentsPhi' => 8,
        /* Starting angle in degrees. */
        'thetaStart' => 0,
        /* Central angle in degrees. */
        'thetaLength' => 360
    );

    /**
     * Radius of the inner hole of the ring.
     *
     * @param array $dom_attributes            
     * @param float|int $radiusInner            
     * @return void
     */
    public function radiusInner(array &$dom_attributes, float $radiusInner)
    {
        $dom_attributes['radiusInner'] = $radiusInner;
    }

    /**
     * Radius of the outer edge of the ring.
     *
     * @param array $dom_attributes            
     * @param float|int $radiusOuter            
     * @return void
     */
    public function radiusOuter(array &$dom_attributes, float $radiusOuter)
    {
        $dom_attributes['radiusOuter'] = $radiusOuter;
    }

    /**
     * Central angle in degrees.
     *
     * @param array $dom_attributes            
     * @param float|int $thetaLength            
     * @return void
     */
    public function thetaLength(array &$dom_attributes, float $thetaLength)
    {
        $dom_attributes['thetaLength'] = $thetaLength;
    }

    /**
     * Starting angle in degrees.
     *
     * @param array $dom_attributes            
     * @param float|int $thetaStart            
     * @return void
     */
    public function thetaStart(array &$dom_attributes, float $thetaStart)
    {
        $dom_attributes['thetaStart'] = $thetaStart;
    }

    /**
     * Number of segments.
     * A higher number means the ring will be more round.
     *
     * @param array $dom_attributes            
     * @param int $segmentsTheta            
     * @return void
     */
    public function segmentsTheta(array &$dom_attributes, int $segmentsTheta)
    {
        $dom_attributes['segmentsTheta'] = $segmentsTheta;
    }

    /**
     * Number of triangles within each face defined by segmentsTheta.
     *
     * @param array $dom_attributes            
     * @param int $segmentsPhi            
     * @return void
     */
    public function segmentsPhi(array &$dom_attributes, int $segmentsPhi)
    {
        $dom_attributes['segmentsPhi'] = $segmentsPhi;
    }
}
