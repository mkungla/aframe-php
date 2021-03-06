<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 20, 2016 - 9:07:01 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 *
 * @category       AframeVR
 * @package        aframe-php
 *
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         Animation.php
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

use \AframeVR\Interfaces\AnimationInterface;
use \DOMElement;

final class Animation implements AnimationInterface
{
    /**
     * Animation DOM attributes array
     *
     * @var array
     */
    protected $attrs;

    /**
     * Constructor
     *
     * @param string $id
     */
    public function __construct(string $id = '0')
    {
        $this->attrs['id'] = $id;
    }

    /**
     * Attribute to animate
     *
     * Attribute to animate. To specify a component attribute, use componentName.property syntax (e.g.,
     * light.intensity).
     *
     * @param string $attr
     * @return AnimationInterface
     */
    public function attribute(string $attr = 'rotation'): AnimationInterface
    {
        $this->attrs['attribute'] = $attr;
        return $this;
    }

    /**
     * Delay (in milliseconds)
     *
     * Delay (in milliseconds) or event name to wait on before beginning animation
     *
     * @param string $ms
     * @return AnimationInterface
     */
    public function delay($ms = '0'): AnimationInterface
    {
        $this->attrs['delay'] = $ms;
        return $this;
    }

    /**
     * Direction of the animation
     *
     * Direction of the animation (between from and to). One of alternate, alternateReverse, normal, reverse.
     *
     * @param string $direction
     * @return AnimationInterface
     */
    public function direction(string $direction = 'normal'): AnimationInterface
    {
        $this->attrs['direction'] = $direction;
        return $this;
    }

    /**
     * Duration in (milliseconds)
     *
     * Duration in (milliseconds) of the animation.
     *
     * @param int $ms
     * @return AnimationInterface
     */
    public function dur(int $ms = 1000): AnimationInterface
    {
        $this->attrs['dur'] = $ms;
        return $this;
    }

    /**
     * Easing function
     *
     * Easing function of the animation. There are very many to choose from.
     *
     * @param string $func
     * @return AnimationInterface
     */
    public function easing(string $func = 'ease'): AnimationInterface
    {
        $this->attrs['easing'] = $func;
        return $this;
    }

    /**
     * Determines effect of animation when not actively in play
     *
     * One of backwards, both, forwards, none.
     *
     * @param string $effect
     * @return AnimationInterface
     */
    public function fill(string $effect = 'forwards'): AnimationInterface
    {
        $this->attrs['fill'] = $effect;
        return $this;
    }

    /**
     * Starting value.
     *
     * @param string $val
     * @return AnimationInterface
     */
    public function from(string $val = 'Current'): AnimationInterface
    {
        $this->attrs['from'] = $val;
        return $this;
    }

    /**
     * Repeat count or indefinite.
     *
     * @param string $count
     * @return AnimationInterface
     */
    public function repeat(string $count = '0'): AnimationInterface
    {
        $this->attrs['repeat'] = $count;
        return $this;
    }

    /**
     * Ending value.
     * Must be specified.
     *
     * @param string $val
     * @return AnimationInterface
     */
    public function to(string $val = 'true'): AnimationInterface
    {
        $this->attrs['to'] = $val;
        return $this;
    }

    /**
     * Create and add DOM element of the entity
     *
     * @param \DOMDocument $aframe_dom
     * @return \DOMElement
     */
    public function domElement(\DOMDocument &$aframe_dom): DOMElement
    {
        $a_entity = $aframe_dom->createElement('a-animation');
        $this->appendAttributes($a_entity);
        return $a_entity;
    }

    /**
     * Append DOM attributes no set by components
     *
     * @param \DOMElement $a_entity
     */
    private function appendAttributes(\DOMElement &$a_entity)
    {
        foreach ($this->attrs as $attribute => $val) {
            $this->setAttribute($a_entity, $attribute, $val);
        }
    }

    private function setAttribute(&$a_entity, $attribute, $val)
    {
        if ($attribute === 'id' && is_numeric($val))
            return;

        $a_entity->setAttribute($attribute, $val);
    }

}
