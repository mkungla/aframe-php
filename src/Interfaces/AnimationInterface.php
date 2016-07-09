<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 25, 2016 - 5:42:53 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         AnimationInterface.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Interfaces;

interface AnimationInterface
{

    /**
     * Attribute to animate
     *
     * Attribute to animate. To specify a component attribute, use componentName.property syntax (e.g.,
     * light.intensity).
     *
     * @param string $attr            
     * @return AnimationInterface
     */
    public function attribute(string $attr = 'rotation'): AnimationInterface;

    /**
     * Delay (in milliseconds)
     *
     * Delay (in milliseconds) or event name to wait on before beginning animation
     *
     * @param string $ms            
     * @return AnimationInterface
     */
    public function begin($ms = '0'): AnimationInterface;

    /**
     * Direction of the animation
     *
     * Direction of the animation (between from and to). One of alternate, alternateReverse, normal, reverse.
     *
     * @param string $direction            
     * @return AnimationInterface
     */
    public function direction(string $direction = 'normal'): AnimationInterface;

    /**
     * Duration in (milliseconds)
     *
     * Duration in (milliseconds) of the animation.
     *
     * @param int $ms            
     * @return AnimationInterface
     */
    public function dur(int $ms = 1000): AnimationInterface;

    /**
     * Easing function
     *
     * Easing function of the animation. There are very many to choose from.
     *
     * @param string $func            
     * @return AnimationInterface
     */
    public function easing(string $func = 'ease'): AnimationInterface;

    /**
     * Determines effect of animation when not actively in play
     *
     * One of backwards, both, forwards, none.
     *
     * @param string $effect            
     * @return AnimationInterface
     */
    public function fill(string $effect = 'forwards'): AnimationInterface;

    /**
     * Starting value.
     *
     * @param string $val            
     * @return AnimationInterface
     */
    public function from(string $val = 'Current'): AnimationInterface;

    /**
     * Repeat count or indefinite.
     *
     * @param int $count            
     * @return AnimationInterface
     */
    public function repeat(int $count = 0): AnimationInterface;

    /**
     * Ending value.
     * Must be specified.
     *
     * @param string $val            
     * @return AnimationInterface
     */
    public function to(string $val = 'true'): AnimationInterface;
}
