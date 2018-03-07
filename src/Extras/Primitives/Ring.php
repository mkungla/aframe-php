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

use \AframeVR\Core\Entity;
use \AframeVR\Interfaces\EntityInterface;

final class Ring extends Entity implements EntityInterface
{

    /**
     * Reset <a-ring>
     *
     * The ring primitive creates a ring or disc shape. It is an entity that prescribes the geometry with its geometric
     * primitive set to ring.
     *
     * @return void
     */
    public function reset()
    {
        parent::reset();
        $this->attr('Geometry')->primitive('ring');
        $this->radiusInner(0.8);
        $this->radiusOuter(1.2);
        $this->segmentsPhi(10);
        $this->segmentsTheta(32);
        $this->thetaLength(360);
        $this->thetaStart(0);
    }

    /**
     * Radius of the inner hole of the ring.
     *
     * @param float $radiusInner            
     * @return Ring
     */
    public function radiusInner(float $radiusInner)
    {
        $this->attr('Geometry')->radiusInner($radiusInner);
        return $this;
    }

    /**
     * Radius of the outer edge of the ring.
     *
     * @param float $radiusOuter            
     * @return Ring
     */
    public function radiusOuter(float $radiusOuter)
    {
        $this->attr('Geometry')->radiusOuter($radiusOuter);
        return $this;
    }

    /**
     * Number of triangles within each face defined by segmentsTheta.
     *
     * @param int $segmentsPhi            
     * @return Ring
     */
    public function segmentsPhi(int $segmentsPhi)
    {
        $this->attr('Geometry')->segmentsPhi($segmentsPhi);
        return $this;
    }

    /**
     * Number of segments.
     * A higher number means the ring will be more round.
     *
     * @param int $segmentsTheta            
     * @return Ring
     */
    public function segmentsTheta(int $segmentsTheta)
    {
        $this->attr('Geometry')->segmentsTheta($segmentsTheta);
        return $this;
    }

    /**
     * Central angle in degrees.
     *
     * @param float $thetaLength            
     * @return Ring
     */
    public function thetaLength(float $thetaLength)
    {
        $this->attr('Geometry')->thetaLength($thetaLength);
        return $this;
    }

    /**
     * Starting angle in degrees.
     *
     * @param float $thetaStart            
     * @return Ring
     */
    public function thetaStart(float $thetaStart)
    {
        $this->attr('Geometry')->thetaStart($thetaStart);
        return $this;
    }
}
