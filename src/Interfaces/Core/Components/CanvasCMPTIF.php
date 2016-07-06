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
 * File         CanvasCMPTIF.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Interfaces\Core\Components;

use \AframeVR\Interfaces\ComponentInterface;

/**
 * Canvas Component Interface
 *
 * The canvas component allows us to specify our own canvas or the size of the injected canvas.
 * The canvas component applies only to the <a-scene> element.
 */
interface CanvasCMPTIF extends ComponentInterface
{

    /**
     * Canvas Selector
     *
     * Selector to a canvas element that exists on the page.
     *
     * @param null|string $active            
     * @return CanvasCMPTIF
     */
    public function canvas(string $active = null): CanvasCMPTIF;

    /**
     * Canvas height
     *
     * Height of the injected canvas, in percentage.
     *
     * @param int|float $height            
     * @return CanvasCMPTIF
     */
    public function height(float $height = 100): CanvasCMPTIF;

    /**
     * Canvas width
     *
     * Height of the injected canvas, in percentage.
     *
     * @param int|float $width            
     * @return CanvasCMPTIF
     */
    public function width(float $width = 100): CanvasCMPTIF;
}