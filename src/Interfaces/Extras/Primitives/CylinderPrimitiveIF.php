<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 28, 2016 - 10:00:54 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         CylinderPrimitiveIF.php
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

interface CylinderPrimitiveIF extends PrimitiveInterface
{

    /**
     * geometry.height
     *
     * @param int|float $height            
     * @return CylinderPrimitiveIF
     */
    public function height(float $height = 1): CylinderPrimitiveIF;

    /**
     * geometry.openEnded
     *
     * @param bool $openEnded            
     * @return CylinderPrimitiveIF
     */
    public function openEnded(bool $openEnded = false): CylinderPrimitiveIF;

    /**
     * geometry.radius
     *
     * @param float $radius            
     * @return CylinderPrimitiveIF
     */
    public function radius(float $radius = 0.75): CylinderPrimitiveIF;

    /**
     * geometry.segmentsHeight
     *
     * @param int $segmentsHeight            
     * @return CylinderPrimitiveIF
     */
    public function segmentsHeight(int $segmentsHeight = 1): CylinderPrimitiveIF;

    /**
     * geometry.segmentsRadial
     *
     * @param int $segmentsRadial            
     * @return CylinderPrimitiveIF
     */
    public function segmentsRadial(int $segmentsRadial = 36): CylinderPrimitiveIF;

    /**
     * geometry.thetaLength
     *
     * @param int $thetaLength            
     * @return CylinderPrimitiveIF
     */
    public function thetaLength(int $thetaLength = 360): CylinderPrimitiveIF;

    /**
     * geometry.thetaStart
     *
     * @param int $thetaStart            
     * @return CylinderPrimitiveIF
     */
    public function thetaStart(int $thetaStart = 0): CylinderPrimitiveIF;
}
