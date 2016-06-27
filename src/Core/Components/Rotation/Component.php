<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 25, 2016 - 7:51:42 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         PositionComponent.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Components\Rotation;

use \AframeVR\Core\Helpers\ComponentAbstract;
use \AframeVR\Core\Helpers\ComponentHelper;
use \AframeVR\Interfaces\ComponentInterface;

/**
 * AframeVR\Core\Components\Rotation
 * 
 * The rotation component defines the orientation of an entity. 
 * It takes the 
 * roll (x), 
 * pitch (y), 
 * and yaw (z) 
 * as three space-delimited numbers indicating degrees of rotation.
 */
class Component extends ComponentAbstract implements ComponentInterface
{
    use ComponentHelper;

    /**
     * Initialize Component
     *
     * {@inheritdoc}
     *
     * @return bool
     */
    public function initializeComponent(): bool
    {
        $this->setDomAttributeName('rotation');
        return true;
    }

    /**
     * Return DOM attribute contents
     *
     * @return string
     */
    public function getDomAttributeString(): string
    {
        $attrs = $this->getDOMAttributesArray();
        return $this->createCoordinateString($attrs['x'], $attrs['y'], $attrs['z']);
    }
}
