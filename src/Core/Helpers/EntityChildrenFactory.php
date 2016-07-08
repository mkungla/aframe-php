<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 5, 2016 - 3:05:38 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         EntityChildrenFactory.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Helpers;

use \AframeVR\Core\Entity;
use \AframeVR\Extras\Primitives\{
    Sphere,
    Box,
    Cylinder,
    Image,
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
    Cursor,
    Light,
    Cone
};

class EntityChildrenFactory
{
    /**
     * Child entities
     *
     * @var array
     */
    protected $childrens = array();

    /**
     * Entity
     *
     * @api
     *
     * @param string $id            
     * @return \AframeVR\Core\Entity
     */
    public function entity(string $id = 'untitled'): Entity
    {
        return $this->childrens[$id] ?? $this->childrens[$id] = new Entity($id);
    }

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
     * A-Frame Primitive curvedimage
     *
     * @return Entity
     */
    public function cursor(string $id = 'untitled'): Entity
    {
        return $this->childrens[$id] ?? $this->childrens[$id] = new Cursor($id);
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
    
    public function getChildern()
    {
        return $this->childrens;
    }
}