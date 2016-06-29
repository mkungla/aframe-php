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
namespace AframeVR\Core\Components\Position;

use \AframeVR\Interfaces\Core\Components\Position\PositionInterface;
use \AframeVR\Core\Helpers\ComponentAbstract;
use \AframeVR\Core\Helpers\ComponentHelper;

class PositionComponent extends ComponentAbstract implements PositionInterface
{
    use ComponentHelper;

    /**
     * Initialize Position Component
     *
     * The position component defines where an entity is placed in the scene's world space.
     * It takes a coordinate value as three space-delimited numbers.
     *
     * {@inheritdoc}
     *
     * @return bool
     *
     */
    public function initializeComponent(): bool
    {
        $this->setDomAttributeName('position');
        return true;
    }

    /**
     * Return DOM attribute contents
     *
     * Position Components dom atribute contains coordinates to point in world
     * Ex: position="1 1 1"
     *
     * @return string
     */
    public function getDomAttributeString(): string
    {
        $attrs = $this->getDOMAttributesArray();
        return $this->createCoordinateString($attrs['x'], $attrs['y'], $attrs['z']);
    }

    /**
     * Get current position coordinates
     *
     * {@inheritdoc}
     *
     * @return string
     */
    public function getPosition(): string
    {
        return $this->getDomAttributeString();
    }
}