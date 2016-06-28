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
 * File         CylinderInterface.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Interfaces\Extras\Primitives;

use \AframeVR\Interfaces\PrimitiveInterface;

interface CylinderInterface extends PrimitiveInterface
{

    /**
     * geometry.height
     *
     * @param int|float $height            
     * @return \AframeVR\Interfaces\Extras\Primitives\CylinderInterface
     */
    public function height(float $height = 1): CylinderInterface;

    /**
     * geometry.openEnded
     *
     * @param bool $openEnded            
     * @return \AframeVR\Interfaces\Extras\Primitives\CylinderInterface
     */
    public function openEnded(bool $openEnded = false): CylinderInterface;

    /**
     * geometry.radius
     *
     * @param float $radius            
     * @return \AframeVR\Interfaces\Extras\Primitives\CylinderInterface
     */
    public function radius(float $radius = 0.75): CylinderInterface;

    /**
     * geometry.segmentsHeight
     *
     * @param int $segmentsHeight            
     * @return \AframeVR\Interfaces\Extras\Primitives\CylinderInterface
     */
    public function segmentsHeight(int $segmentsHeight = 1): CylinderInterface;

    /**
     * geometry.segmentsRadial
     *
     * @param int $segmentsRadial            
     * @return \AframeVR\Interfaces\Extras\Primitives\CylinderInterface
     */
    public function segmentsRadial(int $segmentsRadial = 36): CylinderInterface;

    /**
     * geometry.thetaLength
     *
     * @param int $thetaLength            
     * @return \AframeVR\Interfaces\Extras\Primitives\CylinderInterface
     */
    public function thetaLength(int $thetaLength = 360): CylinderInterface;

    /**
     * geometry.thetaStart
     *
     * @param int $thetaStart            
     * @return \AframeVR\Interfaces\Extras\Primitives\CylinderInterface
     */
    public function thetaStart(int $thetaStart = 0): CylinderInterface;
}
