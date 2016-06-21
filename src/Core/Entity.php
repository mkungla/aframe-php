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
use \AframeVR\Interfaces\ComponentInterface;
use \DOMElement;

class Entity
{

    protected $components = array();

    public function __construct()
    {
        /* Components which All entities inherently have */
        $this->component('Position');
        $this->component('Rotation');
        
        /*
         * We initialize common entity components here since
         * init and defaults are most cases overwritten by extending class
         */
        $this->position();
        $this->rotation();
        
        /* Extending entity components and init */
        $this->init();
        
        /* Extending entity defaults */
        $this->defaults();
    }

    public function position($x = 0, $y = 0, $z = 0): Entity
    {
        $this->component('Position')->update($x, $y, $z);
        return $this;
    }

    public function rotation($x = 0, $y = 0, $z = 0): Entity
    {
        $this->component('Rotation')->update($x, $y, $z);
        return $this;
    }

    /**
     * Load component for this entity
     *
     * @param string $component_name            
     * @throws BadComponentCallException
     */
    public function component(string $component_name): ComponentInterface
    {
        $component_name = strtolower($component_name);
        
        if (! array_key_exists($component_name, $this->components)) {
            try {
                $component = sprintf('\AframeVR\Components\%s', ucfirst($component_name));
                if (class_exists($component)) {
                    $this->components[$component_name] = new $component();
                } else {
                    throw new BadComponentCallException($component_name);
                }
            } catch (BadComponentCallException $e) {
                die($e->getMessage());
            }
        }
        
        return $this->components[$component_name];
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
        return call_user_func_array($this->{$component_name}->bindTo($this), $args);
    }

    public function __toString()
    {
        return call_user_func($this->{"__toString"}->bindTo($this));
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
