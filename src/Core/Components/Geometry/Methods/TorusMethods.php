<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 27, 2016 - 5:59:08 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         TorusMethods.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Components\Geometry\Methods;

class TorusMethods
{

    /**
     * The torus primitive defines a donut shape.
     */
    const DEFAULTS = array(
        /* Radius of the outer edge of the torus. */
        'radius' => 1,
        /* Radius of the tube. */
        'radiusTubular' => 0.2,
        /* Number of segments along the circumference of the tube ends. A higher number means the tube will be more round. */
        'segmentsRadial' => 36,
        /* Number of segments along the circumference of the tube face. A higher number means the tube will be more round. */
        'segmentsTubular' => 32,
        /* Central angle. */
        'arc' => 360
    );

    /**
     * Radius of the outer edge of the torus.
     *
     * @param &array $dom_attributes            
     * @param float|int $radius            
     * @return void
     */
    public function radius(array &$dom_attributes, float $radius)
    {
        $dom_attributes['radius'] = $radius;
    }

    /**
     * Radius of the tube.
     *
     * @param &array $dom_attributes            
     * @param float|int $radiusTubular            
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
     * @param &array $dom_attributes            
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
     * @param &array $dom_attributes            
     * @param int $segmentsTubular            
     * @return void
     */
    public function segmentsTubular(array &$dom_attributes, int $segmentsTubular)
    {
        $dom_attributes['segmentsTubular'] = $segmentsTubular;
    }

    /**
     * Central angle.
     *
     * @param &array $dom_attributes            
     * @param float|int $radiusTubular            
     * @return void
     */
    public function arc(array &$dom_attributes, float $arc)
    {
        $dom_attributes['arc'] = $arc;
    }
}
