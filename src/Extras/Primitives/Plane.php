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

use \AframeVR\Interfaces\Extras\Primitives\PlaneInterface;
use \AframeVR\Core\Entity;
use \AframeVR\Core\Helpers\MeshAttributes;


class Plane extends Entity implements PlaneInterface
{
    use MeshAttributes;

    /**
     * Init <a-plane>
     *
     * The plane primitive creates flat surfaces.
     * It is an entity that prescribes the geometry
     * with its geometric primitive set to plane.
     * 
     * {@inheritdoc}
     * 
     * @return void
     */
    public function init()
    {
        $this->component('Material');
        $this->component('Geometry')->primitive('plane');
        
        /* Load defaults */
    }

    /**
     * Set defaults
     *
     * {@inheritdoc}
     *
     * @return void
     */
    public function defaults()
    {
        $this->height();
        $this->width();
    }

    /**
     * geometry.height
     *
     * {@inheritdoc}
     *
     * @param int|float $height            
     * @return \AframeVR\Interfaces\Extras\Primitives\PlaneInterface
     */
    public function height(float $height = 1): PlaneInterface
    {
        $this->component('Geometry')->height($height);
        return $this;
    }

    /**
     * geometry.width
     *
     * {@inheritdoc}
     *
     * @param int|float $width            
     * @return \AframeVR\Interfaces\Extras\Primitives\PlaneInterface
     */
    public function width(float $width = 1): PlaneInterface
    {
        $this->component('Geometry')->width($width);
        return $this;
    }
}
