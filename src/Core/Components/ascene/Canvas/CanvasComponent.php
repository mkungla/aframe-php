<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 7, 2016 - 1:01:57 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         CanvasComponent.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Components\ascene\Canvas;

use \AframeVR\Interfaces\Core\Components\ascene\CanvasCMPTIF;
use \AframeVR\Core\Helpers\ComponentAbstract;

class CanvasComponent extends ComponentAbstract implements CanvasCMPTIF
{

    /**
     * Initialize Component
     *
     * {@inheritdoc}
     *
     * @return bool
     */
    public function initializeComponent(): bool
    {
        $this->setDomAttribute('canvas');
        $this->height();
        $this->width();
        return true;
    }

    /**
     * Canvas Selector
     *
     * Selector to a canvas element that exists on the page.
     *
     * @param null|string $active
     * @return CanvasCMPTIF
     */
    public function canvas(string $active = null): CanvasCMPTIF
    {
        $this->dom_attributes['canvas'] = $active;
        return $this;
    }
    
    /**
     * Canvas height
     *
     * Height of the injected canvas, in percentage.
     *
     * @param int|float $height
     * @return CanvasCMPTIF
     */
    public function height(float $height = 100): CanvasCMPTIF
    {
        $this->dom_attributes['height'] = $height;
        return $this;
    }
    
    /**
     * Canvas width
     *
     * Height of the injected canvas, in percentage.
     *
     * @param int|float $width
     * @return CanvasCMPTIF
     */
    public function width(float $width = 100): CanvasCMPTIF
    {
        $this->dom_attributes['width'] = $width;
        return $this;
    }
}