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
 * File         BoxInterface.php
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

interface BoxInterface extends PrimitiveInterface
{
    /**
     * geometry.depth
     * 
     * @param float $depth
     * @return \AframeVR\Interfaces\Extras\Primitives\BoxInterface
     */
    public function depth(float $depth = 1): BoxInterface;
    
    /**
     * geometry.height
     * 
     * @param float $height
     * @return \A\AframeVR\Interfaces\Extras\Primitives\BoxInterface
     */
    public function height(float $height = 1): BoxInterface;
    
    /**
     * geometry.width
     * 
     * @param float $width
     * @return \AframeVR\Interfaces\Extras\Primitives\BoxInterface
     */
    public function width(float $width = 1): BoxInterface;
}
