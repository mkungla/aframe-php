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
 * File         ScaleComponent.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Components\Scale;

use \AframeVR\Interfaces\Core\Components\Scale\ScaleInterface;
use \AframeVR\Core\Helpers\ComponentAbstract;
use \AframeVR\Core\Helpers\ComponentHelper;

class ScaleComponent extends ComponentAbstract implements ScaleInterface
{
    use ComponentHelper;

    /**
     * Initialize Scale Component
     *
     * The scale component defines a shrinking, stretching, or skewing transformation of an entity.
     * It takes three scaling factors for the X, Y, and Z axes.
     *
     * Scale compnent dom attribute is scale
     *
     * {@inheritdoc}
     *
     * @return bool
     */
    public function initializeComponent(): bool
    {
        $this->setDomAttributeName('scale');
        return true;
    }

    /**
     * parent::getDomAttributeString
     *
     * Scale Components dom atribute contains coordinates
     * Ex: scale="1 1 1"
     * 
     */
    
    /**
     * Get scale
     *
     * {@inheritdoc}
     *
     * @return string
     */
    public function getScale(): string
    {
        return $this->getDomAttributeString();
    }
    
    /**
     * Return DOM attribute contents
     *
     * Scale Components dom atribute contains coordinates
     * Ex: scale="1 1 1"
     *
     * {@inheritdoc}
     *
     * @return string
     */
    public function getDomAttributeString(): string
    {
        $attrs = $this->getDOMAttributesArray();
        return $this->createCoordinateString($attrs['x'], $attrs['y'], $attrs['z']);
    }

}
