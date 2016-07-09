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
 * @issues      https://github.com/mkungla/aframe-php/issues
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
    Circle,
    Cylinder,
    Image,
    Light,
    Plane,
    Sky,
    Camera,
    ColladaModel,
    Videosphere,
    Video,
    Torus,
    Ring,
    ObjModel,
    Curvedimage,
    Cone
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
    protected $childrens = array();
    /**
     * Sphere primitives
     *
     * @var array
     */
    protected $spheres = array();
    
    /**
     * Box primitives
     *
     * @var array
     */
    protected $boxes = array();
    
    /**
     * Cylinder primitives
     *
     * @var array
     */
    protected $cylinders = array();
    
    /**
     * Plane primitives
     *
     * @var array
     */
    protected $planes = array();
    
    /**
     * Camera primitives
     *
     * @var array
     */
    protected $cameras = array();
    
    /**
     * collada-model primitives
     *
     * @var array
     */
    protected $collada_models = array();
    
    /**
     *
     * @var \AframeVR\Extras\Primitives\Sky $sky
     */
    protected $sky;
    
    /**
     *
     * @var \AframeVR\Extras\Primitives\Videosphere $videosphere
     */
    protected $videosphere;
    
    /**
     *
     * @var array
     */
    protected $images = array();
    
    /**
     *
     * @var lights
     */
    protected $lights = array();
    
    /**
     *
     * @var videos
     */
    protected $videos = array();
    
    /**
     *
     * @var $toruses
     */
    protected $toruses = array();
    
    /**
     *
     * @var $rings
     */
    protected $rings = array();
    
    /**
     *
     * @var $objmodels
     */
    protected $objmodels = array();
    
    /**
     *
     * @var $curvedimages
     */
    protected $curvedimages = array();
    
    /**
     *
     * @var $cones
     */
    protected $cones = array();
    protected $circles = array();

    /**
     * A-Frame Primitive box
     *
     * @param string $id            
     * @return Entity
     */
    public function box(string $id = 'untitled'): Entity
    {
        return $this->childrens[$id] ?? $this->childrens[$id] = new Box($id);
    }

    /**
     * A-Frame Primitive sphere
     *
     * @param string $id            
     * @return Entity
     */
    public function sphere(string $id = 'untitled'): Entity
    {
        return $this->childrens[$id] ?? $this->childrens[$id] = new Sphere($id);
    }

    /**
     * A-Frame Primitive cylinder
     *
     * @param string $id            
     * @return Entity
     */
    public function cylinder(string $id = 'untitled'): Entity
    {
        return $this->childrens[$id] ?? $this->childrens[$id] = new Cylinder($id);
    }

    /**
     * A-Frame Primitive plane
     *
     * @param string $id            
     * @return Entity
     */
    public function plane(string $id = 'untitled'): Entity
    {
        return $this->childrens[$id] ?? $this->childrens[$id] = new Plane($id);
    }

    /**
     * A-Frame Primitive camera
     *
     * @param string $id            
     * @return Entity
     */
    public function camera(string $id = 'untitled'): Entity
    {
        return $this->childrens[$id] ?? $this->childrens[$id] = new Camera($id);
    }

    /**
     * A-Frame Primitive collada-model
     *
     * @param string $id            
     * @return Entity
     */
    public function colladaModel(string $id = 'untitled'): Entity
    {
        return $this->childrens[$id] ?? $this->childrens[$id] = new ColladaModel($id);
    }

    /**
     * A-Frame Primitive image
     *
     * @param string $id            
     * @return Entity
     */
    public function image(string $id = 'untitled'): Entity
    {
        return $this->childrens[$id] ?? $this->childrens[$id] = new Image($id);
    }

    /**
     * A-Frame Primitive light
     *
     * @param string $id            
     * @return Entity
     */
    public function light(string $id = 'untitled'): Entity
    {
        return $this->childrens[$id] ?? $this->childrens[$id] = new Light($id);
    }

    /**
     * A-Frame Primitive video
     *
     * @param string $id            
     * @return Entity
     */
    public function video(string $id = 'untitled'): Entity
    {
        return $this->childrens[$id] ?? $this->childrens[$id] = new Video($id);
    }

    /**
     * A-Frame Primitive torus
     *
     * @param string $id            
     * @return Entity
     */
    public function torus(string $id = 'untitled'): Entity
    {
        return $this->childrens[$id] ?? $this->childrens[$id] = new Torus($id);
    }

    /**
     * A-Frame Primitive ring
     *
     * @param string $id            
     * @return Entity
     */
    public function ring(string $id = 'untitled'): Entity
    {
        return $this->childrens[$id] ?? $this->childrens[$id] = new Ring($id);
    }

    /**
     * A-Frame Primitive obj model
     *
     * @return Entity
     */
    public function objmodel(string $id = 'untitled'): Entity
    {
        return $this->childrens[$id] ?? $this->childrens[$id] = new ObjModel($id);
    }

    /**
     * A-Frame Primitive curvedimage
     *
     * @return Entity
     */
    public function curvedimage(string $id = 'untitled'): Entity
    {
        return $this->childrens[$id] ?? $this->childrens[$id] = new Curvedimage($id);
    }

    /**
     * A-Frame Primitive cone
     *
     * @return Entity
     */
    public function cone(string $id = 'untitled'): Entity
    {
        return $this->childrens[$id] ?? $this->childrens[$id] = new Cone($id);
    }

    /**
     * A-Frame Primitive circle
     *
     * @return Entity
     */
    public function circle(string $id = 'untitled'): Entity
    {
        return $this->childrens[$id] ?? $this->childrens[$id] = new Circle($id);
    }

    /**
     * A-Frame Primitive sky
     *
     * @return Entity
     */
    public function sky(string $id = 'untitled'): Entity
    {
        return $this->sky = new Sky($id);
    }

    /**
     * A-Frame Primitive videosphere
     *
     * @return Entity
     */
    public function videosphere(string $id = 'untitled'): Entity
    {
        return $this->videosphere = new Videosphere($id);
    }

    /**
     * Add all used primitevs to the scene
     *
     * @return void
     */
    protected function preparePrimitives()
    {
        /* Primitive collections */
        $this->aframeDomObj->appendEntities($this->childrens);
        /* Primitives which only one can be present */
        (! $this->sky) ?: $this->aframeDomObj->appendEntity($this->sky);
        (! $this->videosphere) ?: $this->aframeDomObj->appendEntity($this->videosphere);
    }
}
