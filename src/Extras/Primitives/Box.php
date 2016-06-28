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

use \AframeVR\Interfaces\Extras\Primitives\BoxInterface;
use \AframeVR\Core\Entity;
use \AframeVR\Core\Helpers\MeshAttributes;

/**
 * <a-box>
 *
 * The box primitive, formerly called <a-cube>, creates shapes such as boxes, cubes, or walls.
 * It is an entity that prescribes the geometry with its geometric primitive set to box.
 */
class Box extends Entity implements BoxInterface
{
    use MeshAttributes;

    /**
     * Init
     *
     * {@inheritdoc}
     *
     * @return void
     */
    public function init()
    {
        $this->component('Material');
        $this->component('Geometry')->primitive('box');
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
        $this->depth();
        $this->height();
        $this->width();
    }

    /**
     * geometry.depth
     *
     * {@inheritdoc}
     *
     * @param float $depth            
     * @return \AframeVR\Interfaces\Extras\Primitives\BoxInterface
     */
    public function depth(float $depth = 1): BoxInterface
    {
        $this->component('Geometry')->depth($depth);
        return $this;
    }

    /**
     * geometry.height
     *
     * {@inheritdoc}
     *
     * @param float $height            
     * @return \AframeVR\Interfaces\Extras\Primitives\BoxInterface
     */
    public function height(float $height = 1): BoxInterface
    {
        $this->component('Geometry')->height($height);
        return $this;
    }

    /**
     * geometry.width
     *
     * {@inheritdoc}
     *
     * @param float $width            
     * @return \AframeVR\Interfaces\Extras\Primitives\BoxInterface
     */
    public function width(float $width = 1): BoxInterface
    {
        $this->component('Geometry')->width($width);
        return $this;
    }
}
