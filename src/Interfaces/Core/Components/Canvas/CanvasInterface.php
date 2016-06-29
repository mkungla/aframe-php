<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 29, 2016 - 10:16:01 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         CanvasInterface.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Interfaces\Core\Components\Canvas;

use \AframeVR\Interfaces\ComponentInterface;

interface CanvasInterface extends ComponentInterface
{

    /**
     * Canvas Selector
     *
     * Selector to a canvas element that exists on the page.
     *
     * @param string $active            
     * @return void
     */
    public function canvas(string $active = false);

    /**
     * Canvas height
     *
     * Height of the injected canvas, in percentage.
     *
     * @param int|float $height            
     * @return void
     */
    public function height(float $height = 100);

    /**
     * Canvas width
     *
     * Height of the injected canvas, in percentage.
     *
     * @param int|float $width            
     * @return void
     */
    public function width(int $width = 100);
}
