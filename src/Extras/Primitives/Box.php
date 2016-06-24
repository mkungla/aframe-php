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
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Extras\Primitives;

use \AframeVR\Core\Entity;
use \AframeVR\Core\Helpers\MeshAttributes;
use \AframeVR\Interfaces\{
    PrimitiveInterface,
    EntityInterface
};

/**
 * <a-box>
 * 
 * The box primitive, formerly called <a-cube>, creates shapes such as boxes, cubes, or walls.
 * It is an entity that prescribes the geometry with its geometric primitive set to box.
 */
class Box extends Entity implements PrimitiveInterface
{
    use MeshAttributes;

    public function init()
    {
        $this->component('Material');
        $this->component('Geometry')->primitive('box');
    }

    public function depth(float $depth = 1): EntityInterface
    {
        $this->component('Geometry')->depth($depth);
        return $this;
    }

    public function height(float $height = 1): EntityInterface
    {
        $this->component('Geometry')->height($height);
        return $this;
    }

    public function width(float $width = 1): EntityInterface
    {
        $this->component('Geometry')->width($width);
        return $this;
    }

    public function defaults()
    {
        $this->depth();
        $this->height();
        $this->width();
    }
}
 