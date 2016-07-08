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
        $this->depth(1);
        $this->height(1);
        $this->width(1);
    }

    /**
     * geometry.depth
     *
     * @param float $depth            
     * @return self
     */
    public function depth(float $depth): self
    {
        $this->component('Geometry')->depth($depth);
        return $this;
    }

    /**
     * geometry.height
     *
     * @param float $height            
     * @return self
     */
    public function height(float $height): self
    {
        $this->component('Geometry')->height($height);
        return $this;
    }

    /**
     * geometry.width
     *
     * @param float $height            
     * @return self
     */
    public function width(float $width): self
    {
        $this->component('Geometry')->width($width);
        return $this;
    }

    /**
     * Optional: geometry.segmentsHeight
     *
     * @param int $height            
     * @return self
     */
    public function segmentsHeight(int $height): self
    {
        $this->component('Geometry')->segmentsHeight($height);
        return $this;
    }

    /**
     * Optional: geometry.segmentsWidth
     *
     * @param int $width            
     * @return self
     */
    public function segmentsWidth(int $width): self
    {
        $this->component('Geometry')->segmentsWidth($width);
        return $this;
    }

    /**
     * Optional: geometry.segmentsDepth
     *
     * @param int $depth            
     * @return self
     */
    public function segmentsDepth(int $depth): self
    {
        $this->component('Geometry')->segmentsDepth($depth);
        return $this;
    }
}
