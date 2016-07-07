<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 4, 2016 - 10:03:35 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         KeyboardShortcutsCMPTIF.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Interfaces\Core\Components\ascene;

use \AframeVR\Interfaces\ComponentInterface;

/**
 * Keyboard Shortcuts Component (keyboard-shortcuts)
 *
 * The keyboard-shortcuts component toggles global keyboard shortcuts. The keyboard-shortcuts component applies only to
 * the <a-scene> element
 */
interface KeyboardShortcutsCMPTIF extends ComponentInterface
{

    /**
     * enterVR
     *
     * Enables the shortcut to press ‘F’ to enter VR.
     *
     * @param bool $enter_vr            
     * @return KeyboardShortcutsCMPTIF
     */
    public function enterVR(bool $enter_vr = true): KeyboardShortcutsCMPTIF;

    /**
     * resetSensor
     *
     * Enables to shortcut to press ‘Z’ to reset the sensor.
     *
     * @param bool $reset_sensor            
     * @return KeyboardShortcutsCMPTIF
     */
    public function resetSensor(bool $reset_sensor = true): KeyboardShortcutsCMPTIF;
}