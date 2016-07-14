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
use \AframeVR\Core\Exceptions\BadPrimitiveCallException;

/**
 * @method \AframeVR\Core\Entity entity(string $id)
 * @method \AframeVR\Extras\Primitives\Box box(string $id)
 * @method \AframeVR\Extras\Primitives\Camera camera(string $id)
 * @method \AframeVR\Extras\Primitives\Circle circle(string $id)
 * @method \AframeVR\Extras\Primitives\Colladamodel colladamodel(string $id)
 * @method \AframeVR\Extras\Primitives\Cone cone(string $id)
 * @method \AframeVR\Extras\Primitives\Cursor cursor(string $id)
 * @method \AframeVR\Extras\Primitives\Curvedimage curvedimage(string $id)
 * @method \AframeVR\Extras\Primitives\Cylinder cylinder(string $id)
 * @method \AframeVR\Extras\Primitives\Image image(string $id)
 * @method \AframeVR\Extras\Primitives\Light light(string $id)
 * @method \AframeVR\Extras\Primitives\Objmodel objmodel(string $id)
 * @method \AframeVR\Extras\Primitives\Plane plane(string $id)
 * @method \AframeVR\Extras\Primitives\Ring ring(string $id)
 * @method \AframeVR\Extras\Primitives\Sky sky(string $id)
 * @method \AframeVR\Extras\Primitives\Sphere sphere(string $id)
 * @method \AframeVR\Extras\Primitives\Torus torus(string $id)
 * @method \AframeVR\Extras\Primitives\Video video(string $id)
 * @method \AframeVR\Extras\Primitives\Videosphere videosphere(string $id)
 */

class EntityChildrenFactory
{
    /**
     * Child entities
     *
     * @var array
     */
    private $childrens = array();

    /**
     * Get entity
     * 
     * @param string $a_type
     * @param string $id
     * @return AframeVR\Interfaces\EntityInterface
     */
    public function getEntity(string $a_type, string $entity_id)
    {
        $id = $id ?? 0;
        return $this->childrens[$a_type][$entity_id] ?? $this->addEntity($a_type, $entity_id);
    }
    
    /**
     * Get all children for calling parent
     * @return array
     */
    public function getChildren()
    {
        return iterator_to_array($this->getChildrenRAW($this->childrens), false);
    }
    
    /**
     * Get entity
     * 
     * @param string $method
     * @param array $args
     * @return AframeVR\Interfaces\EntityInterface
     */
    public function __call(string $method, array $entity_id)
    {
        $entity_id = $entity_id[0] ?? 0;
        return $this->getEntity($method, $entity_id);
    }
    
    /**
     * Register new entity
     * 
     * Generally you should not call this method directly but if you want to extend
     * EntityChildrenFactory then you can still access it
     *
     * @param string $a_type            
     * @param string $id            
     * @throws BadShaderCallException
     * @return AframeVR\Interfaces\EntityInterface
     */
    protected function addEntity(string $a_type, string $entity_id)
    {
        $primitive = sprintf('\AframeVR\Extras\Primitives\%s', ucfirst($a_type));
        
        if($a_type === 'entity') {
            return $this->childrens[$a_type][$entity_id] = new Entity($entity_id);
        } elseif (class_exists($primitive)) {
            return $this->childrens[$a_type][$entity_id] = new $primitive($entity_id);
        } else {
            throw new BadPrimitiveCallException($a_type);
        }
    }
    
    /**
     * Generate array of children
     * 
     * @param array $array
     */
    protected function getChildrenRAW(array $array) {
        foreach ($array as $value) {
            if (is_array($value)) {
                yield from $this->getChildrenRAW($value);
            } else {
                yield $value;
            }
        }
    }
}