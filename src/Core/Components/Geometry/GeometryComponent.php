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
 * File         GeometryComponent.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Components\Geometry;

use \AframeVR\Core\Helpers\ComponentAbstract;
use \AframeVR\Interfaces\Core\Components\Geometry\GeometryInterface;
use \AframeVR\Core\Exceptions\InvalidComponentArgumentException;

/**
 * AframeVR\Core\Components\Geometry
 *
 * The geometry component provides a basic shape for an entity.
 * The general geometry is defined by the primitive property.
 * Geometric primitives, in computer graphics, means an extremely
 * basic shape. With the primitive defined, additional properties
 * are used to further define the geometry. A material component
 * is usually defined alongside to provide a appearance
 * alongside the shape to create a complete mesh.
 */
class GeometryComponent extends ComponentAbstract implements GeometryInterface
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
        $this->setDomAttributeName('geometry');
        return true;
    }

    /**
     * Return DOM attribute contents
     *
     * @return string
     */
    public function getDomAttributeString(): string
    {
        $geometry_attrs         = $this->getDOMAttributesArray();
        $component_attr_format  = implode(': %s; ', array_keys($geometry_attrs)) . ': %s;';
        
        return vsprintf($component_attr_format, array_values($geometry_attrs));
    }

    /**
     * Set geometry primitive
     *
     * One of box, circle, cone, cylinder, plane, ring, sphere, torus, torusKnot.
     *
     * @param string $primitive            
     * @throws InvalidComponentArgumentException
     * @return void
     */
    public function primitive(string $primitive)
    {
        if (in_array($primitive, self::ALLOWED_PRIMITIVES)) {     
            $this->dom_attributes               = array();
            $method_provider                    = sprintf('%sMethods', ucfirst($primitive));
            $this->dom_attributes['primitive']  = $primitive;
            
            $this->setMethodProvider($method_provider);
        } else {
            throw new InvalidComponentArgumentException((string) $primitive, 'Geometry::primitive');
        }
    }

    /**
     * translate
     *
     * {@inheritdoc}
     *
     * @param int|float $x            
     * @param int|float $y            
     * @param int|float $z            
     * @return void
     */
    public function translate(float $x = 0, float $y = 0, float $z = 0)
    {
        $this->dom_attributes['translate'] = sprintf('%d %d %d', $x, $y, $z);
    }

    /**
     * Set Buffer
     *
     * {@inheritdoc}
     *
     * @param bool $buffer            
     * @return void
     */
    public function buffer(bool $buffer = true)
    {
        $this->dom_attributes['buffer'] = $buffer ? 'true' : 'false';
    }

    /**
     * skipCache
     *
     * {@inheritdoc}
     *
     * @param bool $skipCache            
     * @return void
     */
    public function skipCache(bool $skipCache = false)
    {
        $this->dom_attributes['skipCache'] = $skipCache ? 'true' : 'false';
    }
}
