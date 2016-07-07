<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 7, 2016 - 5:42:58 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         VideoPrimitiveIF.php
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

interface VideoPrimitiveIF extends PrimitiveInterface
{

    /**
     * geometry.height
     *
     * @param int|float $height            
     * @return VideoPrimitiveIF
     */
    public function height(float $height = 1.75): VideoPrimitiveIF;

    /**
     * geometry.width
     *
     * @param int|float $width            
     * @return VideoPrimitiveIF
     */
    public function width(float $width = 3): VideoPrimitiveIF;
}