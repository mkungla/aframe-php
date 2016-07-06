<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 27, 2016 - 3:52:36 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         GeometryCMPTIF.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Interfaces\Core\Components;

use \AframeVR\Interfaces\ComponentInterface;

/**
 * Geometry Component Interface
 *
 * The geometry component provides a basic shape for an entity. The general geometry is defined by the primitive
 * property. Geometric primitives, in computer graphics, means an extremely basic shape. With the primitive defined,
 * additional properties are used to further define the geometry. A material component is usually defined alongside to
 * provide a appearance alongside the shape to create a complete mesh.
 */
interface GeometryCMPTIF extends ComponentInterface
{

    const DEFAULTS = array(
        'primitive' => null,
        'translate' => '0 0 0',
        'buffer' => true,
        'skipCache' => false
    );

    const ALLOWED_PRIMITIVES = array(
        'box',
        'circle',
        'cone',
        'cylinder',
        'plane',
        'ring',
        'sphere',
        'torus',
        'torusKnot'
    );

    /**
     * Set geometry primitive
     *
     * One of box, circle, cone, cylinder, plane, ring, sphere, torus, torusKnot.
     *
     * @param string $primitive            
     * @throws InvalidComponentArgumentException
     * @return GeometryCMPTIF
     */
    public function primitive(string $primitive): GeometryCMPTIF;

    /**
     * translate
     *
     * Translates the geometry relative to its pivot point.
     * The translate property translates the geometry. It is provided as a vec3. This is a useful short-hand for
     * translating the geometry to effectively move its pivot point when running animations.
     *
     * @param int|float $x            
     * @param int|float $y            
     * @param int|float $z            
     * @return GeometryCMPTIF
     */
    public function translate(float $x = 0, float $y = 0, float $z = 0): GeometryCMPTIF;

    /**
     * Set Buffer
     *
     * Transform geometry into a BufferGeometry to reduce memory usage at the cost of being harder to manipulate.
     *
     * @param bool $buffer            
     * @return GeometryCMPTIF
     */
    public function buffer(bool $buffer = true): GeometryCMPTIF;

    /**
     * skipCache
     *
     * Disable retrieving the shared geometry object from the cache.
     *
     * @param bool $skipCache            
     * @return GeometryCMPTIF
     */
    public function skipCache(bool $skipCache = false): GeometryCMPTIF;
}