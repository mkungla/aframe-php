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
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Components\Scale;

use \AframeVR\Interfaces\Core\Components\ScaleCMPTIF;
use \AframeVR\Core\Helpers\ComponentAbstract;
use \AframeVR\Core\Helpers\ComponentHelper;

class ScaleComponent extends ComponentAbstract implements ScaleCMPTIF
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
        $this->setDomAttribute('scale');
        return true;
    }

    /**
     * Scaling factor in the X direction.
     * 
     * {@inheritdoc}
     * 
     * @param double $scale_x            
     * @return void
     */
    public function scaleX(float $scale_x)
    {
        $this->setValues();
        $this->dom_attributes['x'] = $scale_x;
    }

    /**
     * Scaling factor in the Y direction..
     * 
     * {@inheritdoc}
     * 
     * @param double $scale_y            
     * @return void
     */
    public function scaleY(float $scale_y)
    {
        $this->setValues();
        $this->dom_attributes['y'] = $scale_y;
    }

    /**
     * Scaling factor in the Z direction.
     * 
     * {@inheritdoc}
     * 
     * @param double $scale_z            
     * @return void
     */
    public function scaleZ(float $scale_z)
    {
        $this->setValues();
        $this->dom_attributes['z'] = $scale_z;
    }
    
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
    
    /**
     * When any scale component methods are called then init others
     *
     * @param array $dom_attributes
     * @return void
     */
    private function setValues()
    {
        $this->dom_attributes['x'] = $this->dom_attributes['x'] ?? 0;
        $this->dom_attributes['y'] = $this->dom_attributes['y'] ?? 0;
        $this->dom_attributes['z'] = $this->dom_attributes['z'] ?? 0;
    }

}
