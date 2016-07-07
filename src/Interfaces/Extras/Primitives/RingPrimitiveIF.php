<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 7, 2016 - 7:41:22 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         RingPrimitiveIF.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Interfaces\Extras\Primitives;

use \AframeVR\Interfaces\PrimitiveInterface;

interface RingPrimitiveIF extends PrimitiveInterface
{
    /**
     * Radius of the inner hole of the ring.
     *
     * @param int|float $radiusInner
     * @return RingPrimitiveIF
     */
    public function radiusInner(float $radiusInner = 1): RingPrimitiveIF;
    
    /**
     * Radius of the outer edge of the ring.
     *
     * @param int|float $radiusOuter
     * @return RingPrimitiveIF
     */
    public function radiusOuter(float $radiusOuter = 2): RingPrimitiveIF;
    
    /**
     * Number of triangles within each face defined by segmentsTheta.
     *
     * @param int $segmentsPhi
     * @return RingPrimitiveIF
     */
    public function segmentsPhi(int $segmentsPhi = 8): RingPrimitiveIF;
    
    /**
     * Number of segments.
     * A higher number means the ring will be more round.
     *
     * @param int $segmentsTheta
     * @return RingPrimitiveIF
     */
    public function segmentsTheta(int $segmentsTheta = 32): RingPrimitiveIF;
    
    /**
     * Central angle in degrees.
     *
     * @param int|float $thetaLength
     * @return RingPrimitiveIF
     */
    public function thetaLength(float $thetaLength = 360): RingPrimitiveIF;
    
    /**
     * Starting angle in degrees.
     *
     * @param int|float $thetaStart
     * @return RingPrimitiveIF
     */
    public function thetaStart(float $thetaStart = 0): RingPrimitiveIF;
}
