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
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Interfaces;

use \AframeVR\Interfaces\{
    ComponentInterface
};
use \DOMElement;

interface EntityInterface
{

    /**
     * Position component
     *
     * All entities inherently have the position component.
     *
     * @param number $x            
     * @param number $y            
     * @param number $z            
     * @return Entity
     */
    public function position($x = 0, $y = 0, $z = 0): EntityInterface;

    /**
     * Rotation component
     *
     * All entities inherently have the rotation component.
     *
     * @param number $x            
     * @param number $y            
     * @param number $z            
     * @return Entity
     */
    public function rotation($x = 0, $y = 0, $z = 0): EntityInterface;

    /**
     * Scale component
     *
     * All entities inherently have the scale component.
     *
     * @param number $x            
     * @param number $y            
     * @param number $z            
     * @return EntityInterface
     */
    public function scale($x = 0, $y = 0, $z = 0): EntityInterface;

    /**
     * Load component for this entity
     *
     * @param string $component_name            
     * @throws BadComponentCallException
     * @return ComponentInterface|null
     */
    public function component(string $component_name);

    /**
     * Create and add DOM element of the entity
     *
     * @param unknown $aframe_dom            
     * @return DOMElement
     */
    public function DOMElement(&$aframe_dom): DOMElement;
}
 