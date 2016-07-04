<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 20, 2016 - 9:11:10 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         Entity.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core;

use \AframeVR\Core\Exceptions\BadComponentCallException;
use \AframeVR\Interfaces\{
    ComponentInterface,
    EntityInterface,
    AnimationInterface
};
use \AframeVR\Core\Animation;
use \DOMElement;
use \Closure;

class Entity implements EntityInterface
{
    /**
     * Array of used components
     * 
     * @var array
     */
    protected $components = array();

    /**
     * Array of used animations
     * 
     * @var array
     */
    protected $animations = array();

    /**
     * Child entities
     *
     * @var array
     */
    protected $entities = array();
    
    public function __construct()
    {
        /* Components which All entities inherently have */
        $this->component('Position');
        $this->component('Rotation');
        $this->component('Scale');
        
        /* Extending entity components and init */
        $this->init();
        
        /* Extending entity defaults */
        $this->defaults();
    }

    public function init()
    {}

    public function defaults()
    {}

    /**
     * Child entity
     *
     * @param string $name
     * @return Entity
     */
    public function entity(string $name = 'untitled'): Entity
    {
        return $this->entities[$name] ?? $this->entities[$name] = new Entity();
    }
    
    /**
     * Position component
     *
     * All entities inherently have the position component.
     *
     * @param int|float $x_axis            
     * @param int|float $y_axis            
     * @param int|float $z_axis            
     * @return \AframeVR\Core\Entity
     */
    public function position(float $x_axis = 0, float $y_axis = 0, float $z_axis = 0): Entity
    {
        $this->component('Position')->positionX($x_axis);
        $this->component('Position')->positionY($y_axis);
        $this->component('Position')->positionZ($z_axis);
        return $this;
    }

    /**
     * Rotation component
     *
     * All entities inherently have the rotation component.
     *
     * @param int|float $roll            
     * @param int|float $pitch            
     * @param int|float $yaw            
     * @return \AframeVR\Core\Entity
     */
    public function rotation(float $roll = 0, float $pitch = 0, float $yaw = 0): Entity
    {
        $this->component('Rotation')->roll($roll);
        $this->component('Rotation')->pitch($pitch);
        $this->component('Rotation')->yaw($yaw);
        return $this;
    }

    /**
     * Scale component
     *
     * All entities inherently have the scale component.
     *
     * @param int|float $scale_x            
     * @param int|float $scale_y            
     * @param int|float $scale_z            
     * @return \AframeVR\Core\Entity
     */
    public function scale(float $scale_x = 1, float $scale_y = 1, float $scale_z = 1): Entity
    {
        $this->component('Scale')->scaleX($scale_x);
        $this->component('Scale')->scaleY($scale_y);
        $this->component('Scale')->scaleZ($scale_z);
        return $this;
    }

    /**
     * Animations
     *
     * @param string $name            
     * @return \AframeVR\Interfaces\AnimationInterface
     */
    public function animation(string $name = 'untitled'): AnimationInterface
    {
        return $this->animations[$name] ?? $this->animations[$name] = new Animation();
    }

    /**
     * Load component for this entity
     *
     * @param string $component_name            
     * @throws \AframeVR\Core\Exceptions\BadComponentCallException
     * @return object|null
     */
    public function component(string $component_name)
    {
        if (! array_key_exists($component_name, $this->components)) {
            $component = sprintf(
                '\AframeVR\Core\Components\%s\%sComponent',
                ucfirst($component_name),
                ucfirst($component_name)
            );
            if (class_exists($component)) {
                $this->components[$component_name] = new $component();
            } else {
                throw new BadComponentCallException($component_name);
            }
        }
        
        return $this->components[$component_name] ?? null;
    }

    /**
     * Handle entity components
     *
     * Since we might need to customize these to have
     * custom components loaded as $this->methosd aswell therefore
     * we have these placeholder magic methods here
     *
     * @param string $component_name            
     * @param array $args            
     */
    public function __call(string $component_name, array $args)
    {
        if (! method_exists($this, $component_name)) {
            $this->{$component_name} = Closure::bind(function () use ($component_name) {
                return $this->component($component_name);
            }, $this, get_class());
        }
        
        return call_user_func($this->{$component_name}, $args);
    }

    /**
     * Create and add DOM element of the entity
     *
     * @param \DOMDocument $aframe_dom            
     * @return \DOMElement
     */
    public function domElement(\DOMDocument &$aframe_dom): DOMElement
    {
        $a_entity = $aframe_dom->createElement('a-entity');
        foreach ($this->components as $component) {
            /*
             * Check does component has any attributes to add to DOM element.
             * default attributes most of cases are ommited so we might not have any attributes to add
             */
            if ($component->hasDOMAttributes())
                $a_entity->setAttributeNode($component->getDOMAttr());
        }
        
        $this->appendChildren($aframe_dom, $a_entity);
        
        return $a_entity;
    }
    
    private function appendChildren(\DOMDocument &$aframe_dom, \DOMElement &$a_entity)
    {
        foreach($this->entities as $entity) {
            if ($aframe_dom->formatOutput) {
                $com = $aframe_dom->createComment("\n\t");
                $a_entity->appendChild($com);
            }
            $a_entity->appendChild($entity->domElement($aframe_dom));
            if ($aframe_dom->formatOutput) {
                $com = $aframe_dom->createComment("\n");
                $a_entity->appendChild($com);
            }
        }
    }
}
