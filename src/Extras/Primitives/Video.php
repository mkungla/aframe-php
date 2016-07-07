<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 7, 2016 - 5:36:48 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         Video.php
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

use \AframeVR\Interfaces\Extras\Primitives\VideoPrimitiveIF;
use \AframeVR\Core\Entity;
use \AframeVR\Core\Helpers\MeshAttributes;

class Video extends Entity implements VideoPrimitiveIF
{
    use MeshAttributes;

    /**
     * Init <a-sphere>
     *
     * The sphere primitive creates a spherical or polyhedron shapes.
     * It wraps an entity that prescribes the geometry component with its geometric primitive set to sphere.
     *
     * {@inheritdoc}
     *
     * @return void
     */
    public function init()
    {
        /* Load defaults */
        $this->defaults();
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
        $this->component('Material')->shader('flat');
        $this->color('#FFF');
        $this->component('Material')->side('double');
        $this->component('Material')->transparent(true);
        
        $this->component('Geometry')->primitive('plane');
        $this->height(1.75);
        $this->width(3);

    }

    /**
     * geometry.height
     *
     * {@inheritdoc}
     *
     * @param int|float $height
     * @return VideoPrimitiveIF
     */
    public function height(float $height = 1.75): VideoPrimitiveIF
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
     * @return VideoPrimitiveIF
     */
    public function width(float $width = 3): VideoPrimitiveIF
    {
        $this->component('Geometry')->width($width);
        return $this;
    }
}