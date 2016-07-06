<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 4, 2016 - 3:21:00 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         WASDControlsComponent.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Components\WASDControls;

use \AframeVR\Interfaces\Core\Components\WASDControlsCMPTIF;
use \AframeVR\Core\Helpers\ComponentAbstract;

class WASDControlsComponent extends ComponentAbstract implements WASDControlsCMPTIF
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
        $this->setDomAttribute('wasd-controls');
        return true;
    }

    /**
     * Entity acceleration
     *
     * {@inheritdoc}
     *
     * @param int $acceleration            
     * @return WASDControlsCMPTIF
     */
    public function acceleration(int $acceleration = 65): WASDControlsCMPTIF
    {
        $this->dom_attributes['acceleration'] = $acceleration;
        return $this;
    }

    /**
     * AD Axis
     *
     * {@inheritdoc}
     *
     * @param string $axis            
     * @return WASDControlsCMPTIF
     */
    public function adAxis(string $axis = 'x'): WASDControlsCMPTIF
    {
        $this->dom_attributes['adAxis'] = $axis;
        return $this;
    }

    /**
     * AD Inverted
     *
     * {@inheritdoc}
     *
     * @param bool $inverted            
     * @return WASDControlsCMPTIF
     */
    public function adInverted(bool $inverted = false): WASDControlsCMPTIF
    {
        $this->dom_attributes['adInverted'] = $inverted;
        return $this;
    }

    /**
     * Easing
     *
     * {@inheritdoc}
     *
     * @param int $easing            
     * @return WASDControlsCMPTIF
     */
    public function easing(int $easing = 20): WASDControlsCMPTIF
    {
        $this->dom_attributes['easing'] = $easing;
        return $this;
    }

    /**
     * Enaled
     *
     * {@inheritdoc}
     *
     * @param bool $enabled            
     * @return WASDControlsCMPTIF
     */
    public function enabled(bool $enabled = true): WASDControlsCMPTIF
    {
        $this->dom_attributes['enabled'] = $enabled ? 'true' : 'false';
        return $this;
    }

    /**
     * Fly
     *
     * {@inheritdoc}
     *
     * @param bool $fly            
     * @return WASDControlsCMPTIF
     */
    public function fly(bool $fly = false): WASDControlsCMPTIF
    {
        $this->dom_attributes['fly'] = $fly ? 'true' : 'false';
        return $this;
    }

    /**
     * WS Axis
     *
     * {@inheritdoc}
     *
     * @param string $axis            
     * @return WASDControlsCMPTIF
     */
    public function wsAxis(string $axis = 'z'): WASDControlsCMPTIF
    {
        $this->dom_attributes['wsAxis'] = $axis;
        return $this;
    }

    /**
     * WS Inverted
     *
     * {@inheritdoc}
     *
     * @param bool $inverted            
     * @return WASDControlsCMPTIF
     */
    public function wsInverted(bool $inverted = false): WASDControlsCMPTIF
    {
        $this->dom_attributes['wsInverted'] = $inverted ? 'true' : 'false';
        return $this;
    }
}
