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
 * File         RotationComponent.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Components\Rotation;

use \AframeVR\Interfaces\Core\Components\RotationCMPTIF;
use \AframeVR\Core\Helpers\ComponentAbstract;
use \AframeVR\Core\Helpers\ComponentHelper;

class RotationComponent extends ComponentAbstract implements RotationCMPTIF
{
    use ComponentHelper;

    /**
     * Initialize Rotation Component
     *
     * The rotation component defines the orientation of an entity.
     * It takes the
     * roll (x),
     * pitch (y),
     * and yaw (z)
     * as three space-delimited numbers indicating degrees of rotation.
     *
     * {@inheritdoc}
     *
     * @return bool
     */
    public function initializeComponent(): bool
    {
        $this->setDomAttribute('rotation');
        return true;
    }

    /**
     * Get Rotation
     *
     * {@inheritdoc}
     *
     * @return string
     */
    public function getRotation(): string
    {
        return $this->getDomAttributeString();
    }

    /**
     * Return DOM attribute contents
     *
     * Scale Components dom atribute contains roll, pitch, yaw
     * Ex: rotation="1 1 1"
     *
     * @return string
     */
    public function getDomAttributeString(): string
    {
        $attrs = $this->getDOMAttributesArray();
        return $this->createCoordinateString($attrs['x'], $attrs['y'], $attrs['z']);
    }

    /**
     * Roll, rotation about the X-axis.
     *
     * {@inheritdoc}
     *
     * @param double $roll            
     * @return void
     */
    public function roll(float $roll)
    {
        $this->init();
        $this->dom_attributes['x'] = $roll;
    }

    /**
     * Pitch, rotation about the Y-axis.
     *
     * {@inheritdoc}
     *
     * @param double $pitch            
     * @return void
     */
    public function pitch(float $pitch)
    {
        $this->init();
        $this->dom_attributes['y'] = $pitch;
    }

    /**
     * Yaw, rotation about the Z-axis.
     *
     * {@inheritdoc}
     *
     * @param double $yaw            
     * @return void
     */
    public function yaw(float $yaw)
    {
        $this->init();
        $this->dom_attributes['z'] = $yaw;
    }

    /**
     * When any rotation component methods are called then init others
     *
     * {@inheritdoc}
     *
     * @param array $dom_attributes            
     * @return void
     */
    private function init()
    {
        $this->dom_attributes['x'] = $this->dom_attributes['x'] ?? 0;
        $this->dom_attributes['y'] = $this->dom_attributes['y'] ?? 0;
        $this->dom_attributes['z'] = $this->dom_attributes['z'] ?? 0;
    }
}