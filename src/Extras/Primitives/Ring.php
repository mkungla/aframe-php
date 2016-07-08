<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 7, 2016 - 7:46:31 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         Ring.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Extras\Primitives;

use \AframeVR\Interfaces\Extras\Primitives\RingPrimitiveIF;
use \AframeVR\Core\Entity;
use \AframeVR\Core\Helpers\MeshAttributes;

/**
 * <a-ring>
 *
 * The ring primitive creates a ring or disc shape. It is an entity that prescribes the geometry with its geometric
 * primitive set to ring.
 */
final class Ring extends Entity implements RingPrimitiveIF
{

    use MeshAttributes;
    
    /**
     * Set defaults
     *
     * {@inheritdoc}
     *
     * @return void
     */
    public function init()
    {
        $this->component('Geometry')->primitive('ring');
        $this->radiusInner();
        $this->radiusOuter();
        $this->segmentsPhi();
        $this->segmentsTheta();
        $this->thetaLength();
        $this->thetaStart();
    }
    
    /**
     * Radius of the inner hole of the ring.
     *
     * @param int|float $radiusInner
     * @return RingPrimitiveIF
     */
    public function radiusInner(float $radiusInner = 1): RingPrimitiveIF
    {
        $this->component('Geometry')->radiusInner($radiusInner);
        return $this;
    }
    
    /**
     * Radius of the outer edge of the ring.
     *
     * @param int|float $radiusOuter
     * @return RingPrimitiveIF
     */
    public function radiusOuter(float $radiusOuter = 2): RingPrimitiveIF
    {
        $this->component('Geometry')->radiusOuter($radiusOuter);
        return $this;
    }
    
    /**
     * Number of triangles within each face defined by segmentsTheta.
     *
     * @param int $segmentsPhi
     * @return RingPrimitiveIF
     */
    public function segmentsPhi(int $segmentsPhi = 8): RingPrimitiveIF
    {
        $this->component('Geometry')->segmentsPhi($segmentsPhi);
        return $this;
    }
    
    /**
     * Number of segments.
     * A higher number means the ring will be more round.
     *
     * @param int $segmentsTheta
     * @return RingPrimitiveIF
     */
    public function segmentsTheta(int $segmentsTheta = 32): RingPrimitiveIF
    {
        $this->component('Geometry')->segmentsTheta($segmentsTheta);
        return $this;
    }
    
    /**
     * Central angle in degrees.
     *
     * @param int|float $thetaLength
     * @return RingPrimitiveIF
     */
    public function thetaLength(float $thetaLength = 360): RingPrimitiveIF
    {
        $this->component('Geometry')->thetaLength($thetaLength);
        return $this;
    }
    
    /**
     * Starting angle in degrees.
     *
     * @param int|float $thetaStart
     * @return RingPrimitiveIF
     */
    public function thetaStart(float $thetaStart = 0): RingPrimitiveIF
    {
        $this->component('Geometry')->thetaStart($thetaStart);
        return $this;
    }
    
}
