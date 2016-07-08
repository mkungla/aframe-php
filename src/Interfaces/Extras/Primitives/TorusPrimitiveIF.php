<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 7, 2016 - 7:22:14 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         TorusPrimitiveIF.php
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

interface TorusPrimitiveIF extends PrimitiveInterface
{

    /**
     * Radius of the outer edge of the torus.
     * 
     * @param int|float $radius
     * @return TorusPrimitiveIF
     */
    public function radius(float $radius = 1): TorusPrimitiveIF;
    
    /**
     * Radius of the tube.
     *
     * @param double $radiusTubular
     * @return TorusPrimitiveIF
     */
    public function radiusTubular(float $radiusTubular = 0.2): TorusPrimitiveIF;
    
    /**
     * Number of segments along the circumference of the tube ends.
     * A higher number means the tube will be more round.
     *
     * @param int $segmentsRadial
     * @return TorusPrimitiveIF
     */
    public function segmentsRadial(int $segmentsRadial = 36): TorusPrimitiveIF;
    
    /**
     * Number of segments along the circumference of the tube face.
     * A higher number means the tube will be more round.
     *
     * @param int $segmentsTubular
     * @return TorusPrimitiveIF
     */
    public function segmentsTubular(int $segmentsTubular = 8): TorusPrimitiveIF;
    
    /**
     * Central angle.
     *
     * @param int|float $arc
     * @return TorusPrimitiveIF
     */
    public function arc(float $arc = 360): TorusPrimitiveIF;
}
