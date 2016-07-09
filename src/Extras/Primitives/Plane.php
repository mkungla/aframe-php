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

class Plane extends Entity implements EntityInterface
{
    /**
     * Init <a-plane>
     *
     * The plane primitive creates flat surfaces.
     * It is an entity that prescribes the geometry
     * with its geometric primitive set to plane.
     *
     * @return void
     */
    public function reset()
    {
        parent::reset();
        $this->component('Material');
        $this->component('Geometry')->primitive('plane');
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
     * @param float $width            
     * @return self
     */
    public function width(float $width): self
    {
        $this->component('Geometry')->width($width);
        return $this;
    }
}
