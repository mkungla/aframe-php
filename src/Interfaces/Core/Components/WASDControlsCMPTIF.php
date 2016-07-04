<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 4, 2016 - 11:01:49 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         WASDControlsCMPTIF.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Interfaces\Core\Components;

use \AframeVR\Interfaces\ComponentInterface;

/**
 * WASDControls Component Interface (wasd-controls)
 *
 * The wasd-controls component defines the behavior of an entity to be controlled by the WASD keyboard keys. It is
 * usually used alongside the camera component.
 */
interface WASDControlsCMPTIF extends ComponentInterface
{

    /**
     * Entity acceleration
     *
     * How fast the entity accelerates when holding the keys.
     *
     * @param int $acceleration            
     * @return void
     */
    public function acceleration(int $acceleration = 65);

    /**
     * AD Axis
     *
     * Axis that the A and D keys act upon.
     *
     * @param string $axis            
     * @return void
     */
    public function adAxis(string $axis = 'x');

    /**
     * AD Inverted
     *
     * Whether the axis that the A and D keys act upon are inverted.
     *
     * @param bool $inverted            
     * @return void
     */
    public function adInverted(bool $inverted = false);

    /**
     * Easing
     *
     * How fast the entity decelerates after releasing the keys. Like friction.
     *
     * @param int $easing            
     * @return void
     */
    public function easing(int $easing = 20);

    /**
     * Enaled
     *
     * Whether the WASD controls are enabled.
     *
     * @param bool $enabled            
     * @return void
     */
    public function enabled(bool $enabled = true);

    /**
     * Fly
     *
     * Whether or not movement is restricted to the entity’s initial plane.
     *
     * @param bool $fly            
     * @return void
     */
    public function fly(bool $fly = false);

    /**
     * WS Axis
     *
     * Axis that the W and S keys act upon.
     *
     * @param string $axis            
     * @return void
     */
    public function wsAxis(string $axis = 'z');

    /**
     * WS Inverted
     *
     * Whether the axis that the W and S keys act upon are inverted.
     *
     * @param bool $inverted            
     * @return void
     */
    public function wsInverted(bool $inverted = false);
}