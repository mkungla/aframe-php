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
};
use \AframeVR\Core\Entity;

trait Primitives
{

    protected $spheres;

    protected $boxes;

    protected $cylinders;

    protected $planes;

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
     * @param \DOMDocument $aframe_dom            
     * @param \DOMElement $scene            
     */
    protected function DOMAppendPrimitives(\DOMDocument &$aframe_dom, \DOMElement &$scene)
    {
        /* Add sphiers to DOM */
        if (is_array($this->spheres)) {
            foreach ($this->spheres as $sphere) {
                $entity = $sphere->DOMElement($aframe_dom);
                $scene->appendChild($entity);
            }
        }
        /* Add boxes to DOM */
        if (is_array($this->boxes)) {
            foreach ($this->boxes as $box) {
                $entity = $box->DOMElement($aframe_dom);
                $scene->appendChild($entity);
            }
        }
        /* Add cylinders to DOM */
        if (is_array($this->cylinders)) {
            foreach ($this->cylinders as $cylinder) {
                $entity = $cylinder->DOMElement($aframe_dom);
                $scene->appendChild($entity);
            }
        }
        /* Add cylinders to DOM */
        if (is_array($this->planes)) {
            foreach ($this->planes as $plane) {
                $entity = $plane->DOMElement($aframe_dom);
                $scene->appendChild($entity);
            }
        }
        /* Add cylinders to DOM */
        if (is_object($this->sky)) {
            $entity = $this->sky->DOMElement($aframe_dom);
            $scene->appendChild($entity);
        }
    }
}
 