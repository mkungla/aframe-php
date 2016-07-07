<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 7, 2016 - 4:45:06 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         VideospherePrimitiveIF.php
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

interface VideospherePrimitiveIF extends PrimitiveInterface
{
    /**
     * geometry.radius
     *
     * @param int|float $radius
     * @return VideospherePrimitiveIF
     */
    public function radius(float $radius = 100): VideospherePrimitiveIF;
    
    /**
     * geometry.segmentsHeight
     *
     * @param int $segmentsHeigh
     * @return VideospherePrimitiveIF
     */
    public function segmentsHeight($segmentsHeigh = 64): VideospherePrimitiveIF;
    
    /**
     * geometry.segmentsWidth
     *
     * @param int $segmentsWidth
     * @return VideospherePrimitiveIF
     */
    public function segmentsWidth($segmentsWidth = 64): VideospherePrimitiveIF;
}