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
 ^ @issues      https://github.com/mkungla/aframe-php/issues
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

    protected $components = array();

    protected $animations = array();

    public function __construct()
    {
        /* Components which All entities inherently have */
        $this->component('Position');
        $this->component('Rotation');
        $this->component('Scale');
        
        /*
         * We initialize common entity components here since
         * init and defaults are most cases overwritten by extending class
         */
        $this->position();
        $this->rotation();
        $this->scale();
        
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
     * Position component
     *
     * All entities inherently have the position component.
     *
     * @param number $x            
     * @param number $y            
     * @param number $z            
     * @return Entity
     */
    public function position($x = 0, $y = 0, $z = 0): EntityInterface
    {
        $this->component('Position')->update($x, $y, $z);
        return $this;
    }

    /**
     * Rotation component
     *
     * All entities inherently have the rotation component.
     *
     * @param number $x            
     * @param number $y            
     * @param number $z            
     * @return EntityInterface
     */
    public function rotation($x = 0, $y = 0, $z = 0): EntityInterface
    {
        $this->component('Rotation')->update($x, $y, $z);
        return $this;
    }

    /**
     * Scale component
     *
     * All entities inherently have the scale component.
     *
     * @param number $x            
     * @param number $y            
     * @param number $z            
     * @return EntityInterface
     */
    public function scale($x = 0, $y = 0, $z = 0): EntityInterface
    {
        $this->component('Scale')->update($x, $y, $z);
        return $this;
    }

    /**
     * Animations
     *
     * @param string $name            
     * @return AnimationInterface
     */
    public function animation(string $name = 'untitled'): AnimationInterface
    {
        return $this->animations[$name] ?? $this->animations[$name] = new Animation();
    }

    /**
     * Load component for this entity
     *
     * @param string $component_name            
     * @throws BadComponentCallException
     * @return ComponentInterface|null
     */
    public function component(string $component_name)
    {
        $component_name = strtolower($component_name);
        
        if (! array_key_exists($component_name, $this->components)) {
            $component = sprintf('\AframeVR\Components\%s', ucfirst($component_name));
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
     * @param unknown $aframe_dom            
     * @return DOMElement
     */
    public function DOMElement(&$aframe_dom): DOMElement
    {
        /* Create entity DOMElement */
        $a_entity = $aframe_dom->createElement('a-entity', "\n");
        foreach ($this->components as $component) {
            /**
             * Remeve component default properties which are not needed
             */
            $component->removeDefaultDOMAttributes();
            /*
             * Check does component has any attributes to add to DOM element.
             * default attributes most of cases are ommited so we might not have any attributes to add
             */
            if ($component->hasDOMAttributes())
                $a_entity->setAttributeNode($component->getDOMAttributes());
        }
        return $a_entity;
    }
}
