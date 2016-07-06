<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 28, 2016 - 9:35:29 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         BoxPrimitiveIF.php
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

interface BoxPrimitiveIF extends PrimitiveInterface
{

    /**
     * geometry.depth
     *
     * @param int|float $depth            
     * @return BoxPrimitiveIF
     */
    public function depth(float $depth = 1): BoxPrimitiveIF;

    /**
     * geometry.height
     *
     * @param int|float $height            
     * @return BoxPrimitiveIF
     */
    public function height(float $height = 1): BoxPrimitiveIF;

    /**
     * geometry.width
     *
     * @param int|float $width            
     * @return BoxPrimitiveIF
     */
    public function width(float $width = 1): BoxPrimitiveIF;
}
