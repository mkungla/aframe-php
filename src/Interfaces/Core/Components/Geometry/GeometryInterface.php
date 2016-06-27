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
 * File         GeometryInterface.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Interfaces\Core\Components\Geometry;

/**
 * The geometry component provides a basic shape for an entity.
 * The general geometry is defined by the primitive property.
 * Geometric primitives, in computer graphics, means an extremely basic shape. With the primitive defined,
 * additional properties are used to further define the geometry. A material component is usually defined alongside
 * to provide a appearance alongside the shape to create a complete mesh.
 */
interface GeometryInterface
{

    const DEFAULTS = array(
    
        /* One of box, circle, cone, cylinder, plane, ring, sphere, torus, torusKnot. */
        'primitive' => null,
    
        /* The translate property translates the geometry. It is provided as a vec3. This is a useful short-hand for
         * translating the geometry to effectively move its pivot point when running animations. */
        'translate' => '0 0 0',
        /* Transform geometry into a BufferGeometry to reduce memory usage at the cost of being harder to manipulate. */
        'buffer' => true,
        /* Disable retrieving the shared geometry object from the cache. */
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
     * @param string $primitive            
     * @throws InvalidComponentArgumentException
     * @return void
     */
    public function primitive(string $primitive);

    /**
     * translate
     *
     * Translates the geometry relative to its pivot point.
     *
     * @param float|int $x            
     * @param float|int $y            
     * @param float|int $z            
     * @return void
     */
    public function translate(float $x = 0, float $y = 0, float $z = 0);

    /**
     * Set Buffer
     *
     * Transform geometry into a BufferGeometry to reduce memory usage at the cost of being harder to manipulate.
     *
     * @param bool $buffer            
     * @return void
     */
    public function buffer(bool $buffer = true);

    /**
     * skipCache
     *
     * Disable retrieving the shared geometry object from the cache.
     *
     * @param bool $skipCache            
     * @return void
     */
    public function skipCache(bool $skipCache = false);
}
