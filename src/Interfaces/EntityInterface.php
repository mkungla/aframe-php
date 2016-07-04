<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 24, 2016 - 7:19:54 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         EntityInterface.php
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

use \DOMElement;
use \AframeVR\Core\Entity;

interface EntityInterface
{

    /**
     * Position component
     *
     * All entities inherently have the position component.
     *
     * @param int|float $x_axis            
     * @param int|float $y_axis            
     * @param int|float $z_axis            
     * @return \AframeVR\Core\Entity
     */
    public function position(float $x_axis = 0, float $y_axis = 0, float $z_axis = 0): Entity;

    /**
     * Rotation component
     *
     * All entities inherently have the rotation component.
     *
     * @param int|float $roll            
     * @param int|float $pitch            
     * @param int|float $yaw            
     * @return \AframeVR\Core\Entity
     */
    public function rotation(float $roll = 0, float $pitch = 0, float $yaw = 0): Entity;

    /**
     * Scale component
     *
     * All entities inherently have the scale component.
     *
     * @param int|float $scale_x            
     * @param int|float $scale_y            
     * @param int|float $scale_z            
     * @return \AframeVR\Core\Entity
     */
    public function scale(float $scale_x = 0, float $scale_y = 0, float $scale_z = 0): Entity;

    /**
     * Load component for this entity
     *
     * @param string $component_name            
     * @throws BadComponentCallException
     * @return \AframeVR\Core\Entity
     */
    public function component(string $component_name);

    /**
     * Create and add DOM element of the entity
     *
     * @param \DOMDocument $aframe_dom            
     * @return \DOMElement
     */
    public function domElement(\DOMDocument &$aframe_dom): DOMElement;
}
