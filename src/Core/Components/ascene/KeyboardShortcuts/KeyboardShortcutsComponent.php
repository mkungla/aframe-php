<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 7, 2016 - 3:29:20 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         KeyboardShortcutsComponent.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Components\ascene\KeyboardShortcuts;

use \AframeVR\Interfaces\Core\Components\ascene\KeyboardShortcutsCMPTIF;
use \AframeVR\Core\Helpers\ComponentAbstract;

class KeyboardShortcutsComponent extends ComponentAbstract implements KeyboardShortcutsCMPTIF
{


    
    /**
     * Initialize Component
     *
     * {@inheritdoc}
     *
     * @return bool
     */
    public function initializeComponent(): bool
    {
        $this->setDomAttribute('keyboard-shortcuts');
        $this->enterVR();
        $this->resetSensor();
        return true;
    }


     /**
     * enterVR
     *
     * Enables the shortcut to press ‘F’ to enter VR.
     *
     * @param bool $enter_vr            
     * @return KeyboardShortcutsCMPTIF
     */
    public function enterVR(bool $enter_vr = true): KeyboardShortcutsCMPTIF
    {
        $this->dom_attributes['enterVR'] = $enter_vr ? 'true' : 'false';;
        return $this;
    }

    /**
     * resetSensor
     *
     * Enables to shortcut to press ‘Z’ to reset the sensor.
     *
     * @param bool $reset_sensor            
     * @return KeyboardShortcutsCMPTIF
     */
    public function resetSensor(bool $reset_sensor = true): KeyboardShortcutsCMPTIF
    {
        $this->dom_attributes['resetSensor'] = $reset_sensor ? 'true' : 'false';;
        return $this;
    }
}