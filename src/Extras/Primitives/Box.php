<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 21, 2016 - 11:58:54 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         Box.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Extras\Primitives;

use \AframeVR\Core\Entity;
use \AframeVR\Interfaces\EntityInterface;

class Box extends Entity implements EntityInterface
{

    /**
     * Init <a-box>
     *
     * The box primitive, formerly called <a-cube>, creates shapes such as boxes, cubes, or walls. It is an entity that
     * prescribes the geometry with its geometric primitive set to box.
     *
     * @return void
     */
    public function reset()
    {
        parent::reset();
        $this->component('Geometry')->primitive('box');
    }

    /**
     * geometry.depth
     *
     * @param float $depth            
     * @return \AframeVR\Extras\Primitives\Box
     */
    public function depth(float $depth)
    {
        $this->component('Geometry')->depth($depth);
        return $this;
    }

    /**
     * geometry.height
     *
     * @param float $height            
     * @return \AframeVR\Extras\Primitives\Box
     */
    public function height(float $height)
    {
        $this->component('Geometry')->height($height);
        return $this;
    }

    /**
     * geometry.width
     *
     * @param float $width            
     * @return \AframeVR\Extras\Primitives\Box
     */
    public function width(float $width)
    {
        $this->component('Geometry')->width($width);
        return $this;
    }

    /**
     * Optional: geometry.segmentsHeight
     *
     * @param int $height            
     * @return \AframeVR\Extras\Primitives\Box
     */
    public function segmentsHeight(int $height)
    {
        $this->component('Geometry')->segmentsHeight($height);
        return $this;
    }

    /**
     * Optional: geometry.segmentsWidth
     *
     * @param int $width            
     * @return \AframeVR\Extras\Primitives\Box
     */
    public function segmentsWidth(int $width)
    {
        $this->component('Geometry')->segmentsWidth($width);
        return $this;
    }

    /**
     * Optional: geometry.segmentsDepth
     *
     * @param int $depth            
     * @return \AframeVR\Extras\Primitives\Box
     */
    public function segmentsDepth(int $depth)
    {
        $this->component('Geometry')->segmentsDepth($depth);
        return $this;
    }
}
