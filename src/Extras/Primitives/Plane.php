<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 21, 2016 - 12:30:42 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         Plane.php
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
use \AframeVR\Interfaces\PrimitiveInterface;

/**
 * <a-plane>
 *
 * The plane primitive creates flat surfaces. It is an entity that prescribes the geometry with its geometric primitive set to plane.
 */
class Plane extends Entity implements PrimitiveInterface
{
    use MeshAttributes;

    public function init()
    {
        $this->component('Material');
        $this->component('Geometry')->primitive('plane');
        
        /* Load defaults */
    }

    public function height(float $height = 1)
    {
        $this->component('Geometry')->height($height);
        return $this;
    }

    public function width(float $width = 1)
    {
        $this->component('Geometry')->width($width);
        return $this;
    }

    public function defaults()
    {
        $this->height();
        $this->width();
    }
}
 