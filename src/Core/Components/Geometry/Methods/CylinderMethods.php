<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 27, 2016 - 4:29:53 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         CylinderMethods.php
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

/**
 * The cylinder primitive can define cylinders in the traditional sense like a Coca-Cola™ can,
 * but it can also define shapes such as tubes and curved surfaces.
 * We’ll go over some of these cylinder recipes below.
 * 1. Traditional cylinders can be defined by using only a height and a radius:
 * 2. Tubes can be defined by making the cylinder open-ended,
 * which removes the top and bottom surfaces of the cylinder such that the inside is visible.
 * A double-sided material will be needed to render properly:
 * 3. Curved surfaces can be defined by specifying the angle
 * via thetaLength such that the cylinder doesn’t curve all the way around,
 * making the cylinder open-ended, and then making the material double-sided.
 * 4. Other types of prisms can be defined by varying the number
 * of radial segments (i.e., sides). For example, to make a hexagonal prism:
 */
class CylinderMethods
{

    const DEFAULTS = array(
        'height' => 3,
        'radius' => 2,
        'segmentsRadial' => 36,
        'segmentsHeight' => 18,
        'openEnded' => 'false',
        'thetaStart' => 0,
        'thetaLength' => 360
    );

    /**
     * Height of the cylinder.
     *
     * @param array $dom_attributes            
     * @param double $height            
     * @return void
     */
    public function height(array &$dom_attributes, float $height)
    {
        $dom_attributes['height'] = $height;
    }

    /**
     * Whether the ends of the cylinder are open (true) or capped (false).
     *
     * @param array $dom_attributes            
     * @param bool|false $openEnded            
     * @return void
     */
    public function openEnded(array &$dom_attributes, bool $openEnded = false)
    {
        $dom_attributes['openEnded'] = $openEnded ? 'true' : 'false';
    }

    /**
     * Radius of the cylinder.
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
     * Number of rows of faces along the height of the cylinder.
     *
     * @param array $dom_attributes            
     * @param int $segmentsHeight            
     * @return void
     */
    public function segmentsHeight(array &$dom_attributes, int $segmentsHeight)
    {
        $dom_attributes['segmentsHeight'] = $segmentsHeight;
    }

    /**
     * Central angle in degrees.
     *
     * @param array $dom_attributes            
     * @param double $thetaLength            
     * @return void
     */
    public function thetaLength(array &$dom_attributes, float $thetaLength)
    {
        $dom_attributes['thetaLength'] = $thetaLength;
    }

    /**
     * Starting angle in degrees.
     *
     * @param array $dom_attributes            
     * @param double $thetaStart            
     * @return void
     */
    public function thetaStart(array &$dom_attributes, float $thetaStart)
    {
        $dom_attributes['thetaStart'] = $thetaStart;
    }

    /**
     * Number of segmented faces around the circumference of the cylinder.
     *
     * @param array $dom_attributes            
     * @param int $segmentsRadial            
     * @return void
     */
    public function segmentsRadial(array &$dom_attributes, int $segmentsRadial)
    {
        $dom_attributes['segmentsRadial'] = $segmentsRadial;
    }
}
