<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 20, 2016 - 10:21:07 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         Primitives.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Extras;

use \AframeVR\Extras\Primitives\{
    Sphere,
    Box,
    Cylinder,
    Plane,
    Sky
}
;
use \AframeVR\Core\Entity;

trait Primitives
{

    /**
     * Aframe Document Object Model
     *
     * @var \AframeVR\Core\DOM\AframeDOMDocument
     */
    protected $aframeDomObj;

    /**
     *
     * @var array $spheres
     */
    protected $spheres = array();

    /**
     *
     * @var array $boxes
     */
    protected $boxes = array();

    /**
     *
     * @var array $cylinders
     */
    protected $cylinders = array();

    /**
     *
     * @var array $planes
     */
    protected $planes = array();

    /**
     *
     * @var \AframeVR\Extras\Primitives\Sky $sky
     */
    protected $sky;

    /**
     * A-Frame Primitive box
     *
     * @param string $name            
     * @return Entity
     */
    public function box(string $name = 'untitled'): Entity
    {
        return $this->boxes[$name] ?? $this->boxes[$name] = new Box();
    }

    /**
     * A-Frame Primitive sphere
     *
     * @param string $name            
     * @return Entity
     */
    public function sphere(string $name = 'untitled'): Entity
    {
        return $this->spheres[$name] ?? $this->spheres[$name] = new Sphere();
    }

    /**
     * A-Frame Primitive cylinder
     *
     * @param string $name            
     * @return Entity
     */
    public function cylinder(string $name = 'untitled'): Entity
    {
        return $this->cylinders[$name] ?? $this->cylinders[$name] = new Cylinder();
    }

    /**
     * A-Frame Primitive plane
     *
     * @param string $name            
     * @return Entity
     */
    public function plane(string $name = 'untitled'): Entity
    {
        return $this->planes[$name] ?? $this->planes[$name] = new Plane();
    }

    /**
     * A-Frame Primitive sky
     *
     * @return Entity
     */
    public function sky(): Entity
    {
        return $this->sky = new Sky();
    }

    /**
     * Add all used primitevs to the scene
     *
     * @return void
     */
    protected function preparePrimitives()
    {
        /* Primitive collections */
        $this->aframeDomObj->appendEntities($this->boxes);
        $this->aframeDomObj->appendEntities($this->spheres);
        $this->aframeDomObj->appendEntities($this->cylinders);
        $this->aframeDomObj->appendEntities($this->planes);
        
        /* Primitives which only one can be present */
        (! $this->sky) ?: $this->aframeDomObj->appendEntity($this->sky);
    }
}
