<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 27, 2016 - 6:05:03 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         TorusKnotMethods.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Components\Geometry\Methods;

class TorusKnotMethods
{

    /**
     * The torus knot primitive defines a pretzel shape, 
     * the particular shape of which is defined by a pair of coprime integers, p and q.
     * If p and q are not coprime the result will be a torus link.
     */
    const DEFAULTS = array(
        /* Radius that contains the torus knot. */
        'radius' => 1,
        /* Radius of the tubes of the torus knot. */
        'radiusTubular' => 0.2,
        /* Number of segments along the circumference of the tube ends. 
         * A higher number means the tube will be more round. */
        'segmentsRadial' => 36,
        /* Number of segments along the circumference of the tube face. 
         * A higher number means the tube will be more round. */
        'segmentsTubular' => 32,
        /* Number that helps define the pretzel shape. */
        'p' => 2,
        /* Number that helps define the pretzel shape. */
        'q' => 3
    );

    /**
     * Radius that contains the torus knot.
     *
     * @param array $dom_attributes            
     * @param double $radius            
     * @return void
     */
    public function radius(array &$dom_attributes, float $radius)
    {
        $dom_attributes['radius'] = $radius;
    }

    /**
     * Radius of the tubes of the torus knot.
     *
     * @param array $dom_attributes            
     * @param double $radiusTubular            
     * @return void
     */
    public function radiusTubular(array &$dom_attributes, float $radiusTubular)
    {
        $dom_attributes['radiusTubular'] = $radiusTubular;
    }

    /**
     * Number of segments along the circumference of the tube ends.
     * A higher number means the tube will be more round.
     *
     * @param array $dom_attributes            
     * @param int $segmentsRadial            
     * @return void
     */
    public function segmentsRadial(array &$dom_attributes, int $segmentsRadial)
    {
        $dom_attributes['segmentsRadial'] = $segmentsRadial;
    }

    /**
     * Number of segments along the circumference of the tube face.
     * A higher number means the tube will be more round.
     *
     * @param array $dom_attributes            
     * @param int $segmentsTubular            
     * @return void
     */
    public function segmentsTubular(array &$dom_attributes, int $segmentsTubular)
    {
        $dom_attributes['segmentsTubular'] = $segmentsTubular;
    }

    /**
     * Number that helps define the pretzel shape.
     *
     * @param array $dom_attributes            
     * @param int $p            
     * @return void
     */
    public function p(array &$dom_attributes, int $p)
    {
        $dom_attributes['p'] = $p;
    }

    /**
     * Number that helps define the pretzel shape.
     *
     * @param array $dom_attributes            
     * @param int $q            
     * @return void
     */
    public function q(array &$dom_attributes, int $q)
    {
        $dom_attributes['q'] = $q;
    }
}
