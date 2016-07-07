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
    Curvedimage
};
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
     * A-Frame Primitive box
     *
     * @param string $id            
     * @return Entity
     */
    public function box(string $id = 'untitled'): Entity
    {
        return $this->boxes[$id] ?? $this->boxes[$id] = new Box($id);
    }

    /**
     * A-Frame Primitive sphere
     *
     * @param string $id            
     * @return Entity
     */
    public function sphere(string $id = 'untitled'): Entity
    {
        return $this->spheres[$id] ?? $this->spheres[$id] = new Sphere($id);
    }

    /**
     * A-Frame Primitive cylinder
     *
     * @param string $id            
     * @return Entity
     */
    public function cylinder(string $id = 'untitled'): Entity
    {
        return $this->cylinders[$id] ?? $this->cylinders[$id] = new Cylinder($id);
    }

    /**
     * A-Frame Primitive plane
     *
     * @param string $id            
     * @return Entity
     */
    public function plane(string $id = 'untitled'): Entity
    {
        return $this->planes[$id] ?? $this->planes[$id] = new Plane($id);
    }

    /**
     * A-Frame Primitive camera
     *
     * @param string $id            
     * @return Entity
     */
    public function camera(string $id = 'untitled'): Entity
    {
        return $this->cameras[$id] ?? $this->cameras[$id] = new Camera($id);
    }

    /**
     * A-Frame Primitive collada-model
     *
     * @param string $id            
     * @return Entity
     */
    public function colladaModel(string $id = 'untitled'): Entity
    {
        return $this->collada_models[$id] ?? $this->collada_models[$id] = new ColladaModel($id);
    }

    /**
     * A-Frame Primitive image
     *
     * @param string $id            
     * @return Entity
     */
    public function image(string $id = 'untitled'): Entity
    {
        return $this->images[$id] ?? $this->images[$id] = new Image($id);
    }

    /**
     * A-Frame Primitive light
     *
     * @param string $id            
     * @return Entity
     */
    public function light(string $id = 'untitled'): Entity
    {
        return $this->lights[$id] ?? $this->lights[$id] = new Light($id);
    }

    /**
     * A-Frame Primitive video
     *
     * @param string $id
     * @return Entity
     */
    public function video(string $id = 'untitled'): Entity
    {
        return $this->videos[$id] ?? $this->videos[$id] = new Video($id);
    }
    
    /**
     * A-Frame Primitive torus
     *
     * @param string $id
     * @return Entity
     */
    public function torus(string $id = 'untitled'): Entity
    {
        return $this->toruses[$id] ?? $this->toruses[$id] = new Torus($id);
    }
    
    /**
     * A-Frame Primitive ring
     *
     * @param string $id
     * @return Entity
     */
    public function ring(string $id = 'untitled'): Entity
    {
        return $this->rings[$id] ?? $this->rings[$id] = new Ring($id);
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
     * A-Frame Primitive sky
     *
     * @return Entity
     */
    public function videosphere(): Entity
    {
        return $this->videosphere = new Videosphere();
    }
    
    /**
     * A-Frame Primitive obj model
     *
     * @return Entity
     */
    public function objmodel(string $id = 'untitled'): Entity
    {
        return $this->objmodels[$id] ?? $this->objmodels[$id] = new ObjModel($id);
    }
    
    /**
     * A-Frame Primitive curvedimage
     *
     * @return Entity
     */
    public function curvedimage(string $id = 'untitled'): Entity
    {
        return $this->curvedimages[$id] ?? $this->curvedimages[$id] = new Curvedimage($id);
    }
    /**
     * Add all used primitevs to the scene
     *
     * @return void
     */
    protected function preparePrimitives()
    {
        /* Primitive collections */
        $this->aframeDomObj->appendEntities($this->cameras);
        $this->aframeDomObj->appendEntities($this->boxes);
        $this->aframeDomObj->appendEntities($this->spheres);
        $this->aframeDomObj->appendEntities($this->cylinders);
        $this->aframeDomObj->appendEntities($this->planes);
        $this->aframeDomObj->appendEntities($this->collada_models);
        $this->aframeDomObj->appendEntities($this->images);
        $this->aframeDomObj->appendEntities($this->lights);
        $this->aframeDomObj->appendEntities($this->videos);
        $this->aframeDomObj->appendEntities($this->toruses);
        $this->aframeDomObj->appendEntities($this->rings);
        $this->aframeDomObj->appendEntities($this->objmodels);
        $this->aframeDomObj->appendEntities($this->curvedimages);
        /* Primitives which only one can be present */
        (! $this->sky) ?: $this->aframeDomObj->appendEntity($this->sky);
        (! $this->videosphere) ?: $this->aframeDomObj->appendEntity($this->videosphere);
    }
}
