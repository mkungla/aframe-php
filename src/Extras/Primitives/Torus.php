<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 7, 2016 - 7:27:20 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         Torus.php
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

final class Torus extends Entity implements EntityInterface
{

    /**
     * Init <a-torus>
     *
     * The torus primitive creates a donut or circular tube shape. It is an entity that prescribes the geometry with
     * its
     * geometric primitive set to torus.
     *
     * @return void
     */
    public function reset()
    {
        parent::reset();
        /* Load defaults */
        $this->attr('Geometry')->primitive('torus');
        
        $this->radius();
        $this->radiusTubular();
        $this->segmentsRadial();
        $this->segmentsTubular();
        $this->arc();
    }

    /**
     * Radius of the outer edge of the torus.
     *
     * @param int|float $radius            
     * @return Torus
     */
    public function radius(float $radius = 1)
    {
        $this->attr('Geometry')->radius($radius);
        return $this;
    }

    /**
     * Radius of the tube.
     *
     * @param float $radiusTubular            
     * @return Torus
     */
    public function radiusTubular(float $radiusTubular = 0.2)
    {
        $this->attr('Geometry')->radiusTubular($radiusTubular);
        return $this;
    }

    /**
     * Number of segments along the circumference of the tube ends.
     * A higher number means the tube will be more round.
     *
     * @param int $segmentsRadial            
     * @return Torus
     */
    public function segmentsRadial(int $segmentsRadial = 36)
    {
        $this->attr('Geometry')->segmentsRadial($segmentsRadial);
        return $this;
    }

    /**
     * Number of segments along the circumference of the tube face.
     * A higher number means the tube will be more round.
     *
     * @param int $segmentsTubular            
     * @return Torus
     */
    public function segmentsTubular(int $segmentsTubular = 32)
    {
        $this->attr('Geometry')->segmentsTubular($segmentsTubular);
        return $this;
    }

    /**
     * Central angle.
     *
     * @param int|float $arc            
     * @return Torus
     */
    public function arc(float $arc = 360)
    {
        $this->attr('Geometry')->arc($arc);
        return $this;
    }
}
