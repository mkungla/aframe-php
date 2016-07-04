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
     * @return void
     */
    public function acceleration(int $acceleration = 65)
    {
        $this->dom_attributes['acceleration'] = $acceleration;
    }
    
    /**
     * AD Axis
     *
     * {@inheritdoc}
     *
     * @param string $axis
     * @return void
     */
    public function adAxis(string $axis = 'x')
    {
        $this->dom_attributes['adAxis'] = $axis;
    }
    
    /**
     * AD Inverted
     *
     * {@inheritdoc}
     *
     * @param bool $inverted
     * @return void
     */
    public function adInverted(bool $inverted = false)
    {
        $this->dom_attributes['adInverted'] = $inverted;
    }
    
    /**
     * Easing
     *
     * {@inheritdoc}
     *
     * @param int $easing
     * @return void
     */
    public function easing(int $easing = 20)
    {
        $this->dom_attributes['easing'] = $easing;
    }
    
    /**
     * Enaled
     *
     * {@inheritdoc}
     *
     * @param bool $enabled
     * @return void
     */
    public function enabled(bool $enabled = true)
    {
        $this->dom_attributes['enabled'] = $enabled ? 'true' : 'false';
    }
    
    /**
     * Fly
     *
     * {@inheritdoc}
     *
     * @param bool $fly
     * @return void
     */
    public function fly(bool $fly = false)
    {
        $this->dom_attributes['fly'] = $fly ? 'true' : 'false';
    }
    
    /**
     * WS Axis
     *
     * {@inheritdoc}
     *
     * @param string $axis
     * @return void
     */
    public function wsAxis(string $axis = 'z')
    {
        $this->dom_attributes['wsAxis'] = $axis;
    }
    
    /**
     * WS Inverted
     *
     * {@inheritdoc}
     *
     * @param bool $inverted
     * @return void
     */
    public function wsInverted(bool $inverted = false)
    {
        $this->dom_attributes['wsInverted'] = $inverted ? 'true' : 'false';;
    }
}
