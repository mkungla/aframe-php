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
use \AframeVR\Core\Helpers\{
    EntityChildrenFactory,
    MeshAttributes,
    Helper
};
use \AframeVR\Core\Animation;
use \DOMElement;
use \Closure;

class Entity implements EntityInterface
{
    use MeshAttributes;
    
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
     * Dom element attributes
     *
     * @var unknown
     */
    protected $attrs = array();
    
    /**
     * Children Factory
     *
     * @var \AframeVR\Core\Helpers\EntityChildrenFactory
     */
    protected $childrenFactory;
    
    /**
     * Indent used when rendering formated outout
     *
     * @var unknown
     */
    private $indentation = 0;

    /**
     * Constructor
     *
     * @param string $id            
     */
    public function __construct(string $id = 'untitled')
    {
        $this->attr('id', $id);
        
        /* Extending entity reset | initial setup */
        $this->reset();
    }

    /**
     * Reset primitive default attributtes
     *
     * {@inheritdoc}
     *
     * @return void
     */
    public function reset()
    {
        /* Components which All entities inherently have */
        $this->component('Position');
        $this->component('Rotation');
        $this->component('Scale');
    }

    /**
     * Set DOM attributes
     *
     * @param string $attr            
     * @param string $val            
     * @return void
     */
    public function attr(string $attr, string $val)
    {
        $this->attrs[$attr] = $val;
    }

    /**
     * Child entity / primitive
     *
     * @return \AframeVR\Core\Helpers\EntityChildrenFactory
     */
    public function child(): EntityChildrenFactory
    {
        return $this->childrenFactory ?? $this->childrenFactory = new EntityChildrenFactory();
    }

    /**
     * Position component
     *
     * All entities inherently have the position component.
     *
     * @param int|float $x_axis            
     * @param int|float $y_axis            
     * @param int|float $z_axis            
     * @return \AframeVR\Interfaces\EntityInterface
     */
    public function position(float $x_axis = 0, float $y_axis = 0, float $z_axis = 0): EntityInterface
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
     * @return \AframeVR\Interfaces\EntityInterface
     */
    public function rotation(float $roll = 0, float $pitch = 0, float $yaw = 0): EntityInterface
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
     * @return \AframeVR\Interfaces\EntityInterface
     */
    public function scale(float $scale_x = 1, float $scale_y = 1, float $scale_z = 1): EntityInterface
    {
        $this->component('Scale')->scaleX($scale_x);
        $this->component('Scale')->scaleY($scale_y);
        $this->component('Scale')->scaleZ($scale_z);
        return $this;
    }

    /**
     * Animations
     *
     * @param mixed $name            
     * @return \AframeVR\Interfaces\AnimationInterface
     */
    public function animation($name = 'untitled'): AnimationInterface
    {
        return $this->animations[$name] ?? $this->animations[$name] = new Animation();
    }

    /**
     * Set mixin attribute
     *
     * @param string $id            
     * @return \AframeVR\Core\Entity
     */
    public function mixin(string $id)
    {
        $this->attr('mixin', $id);
        return $this;
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
            $component = sprintf('\AframeVR\Core\Components\%s\%sComponent', ucfirst($component_name), 
                ucfirst($component_name));
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
            $this->{$component_name} = Closure::bind(
                function () use ($component_name) {
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
        
        $this->appendAttributes($a_entity);
 
        foreach ($this->components as $component) {
            /*
             * Check does component has any attributes to add to DOM element.
             * default attributes most of cases are ommited so we might not have any attributes to add
             */
            if ($component->hasDOMAttributes())
                $a_entity->setAttributeNode($component->getDOMAttr());
        }
        
        $this->appendChildren($aframe_dom, $a_entity);
        $this->appendAnimations($aframe_dom, $a_entity);
        return $a_entity;
    }

    /**
     * Append DOM attributes no set by components
     *
     * @param \DOMElement $a_entity            
     */
    private function appendAttributes(\DOMElement &$a_entity)
    {
        foreach ($this->attrs as $attr => $val) {
            $this->setAttribute($a_entity, $attr, $val);
        }
    }

    private function setAttribute(&$a_entity, $attr, $val)
    {
        if ($attr === 'id' && ($val === 'untitled' || is_numeric($val)))
            return;
        
        $a_entity->setAttribute($attr, $val);
    }

    /**
     * Append childern to entities DOM element
     *
     * @param \DOMDocument $aframe_dom            
     * @param \DOMElement $a_entity            
     */
    private function appendChildren(\DOMDocument &$aframe_dom, \DOMElement &$a_entity)
    {
        if ($this->childrenFactory instanceof EntityChildrenFactory) {
            foreach ($this->childrenFactory->getChildern() as $child) {
                $this->addFormatComment($aframe_dom, $a_entity, "\n\t");
                $a_entity->appendChild($child->domElement($aframe_dom));
                $this->addFormatComment($aframe_dom, $a_entity, '');
            }
        }
    }

    /**
     * Append childern to entities DOM element
     *
     * @param \DOMDocument $aframe_dom            
     * @param \DOMElement $a_entity            
     */
    private function appendAnimations(\DOMDocument &$aframe_dom, \DOMElement &$a_entity)
    {
        foreach ($this->animations as $animations) {
            $this->addFormatComment($aframe_dom, $a_entity, "\n\t");
            $a_entity->appendChild($animations->domElement($aframe_dom));
            $this->addFormatComment($aframe_dom, $a_entity, '');
        }
    }

    /**
     * Add format comment
     * 
     * @param \DOMDocument $aframe_dom            
     * @param \DOMElement $a_entity            
     * @param string $content            
     */
    private function addFormatComment(\DOMDocument &$aframe_dom, \DOMElement &$a_entity, string $content)
    {
        if ($aframe_dom->formatOutput) {
            $com = $aframe_dom->createComment($content);
            $a_entity->appendChild($com);
        }
    }
}
