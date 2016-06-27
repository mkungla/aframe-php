<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 27, 2016 - 4:04:42 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         SphereMethods.php
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

class SphereMethods
{

    /**
     * The sphere primitive can define spheres in the traditional sense like a basketball.
     *
     * But it can also define various polyhedrons and abstract shapes given that it can specify
     * the number of horizontal and vertical angles and faces.
     *
     * Sticking with a basic sphere, the default number of segments is high enough to make the sphere appear round.
     */
    const DEFAULTS = array(
        /* Radius of the sphere. */
        'radius' => 1,
        /* Number of horizontal segments. */
        'segmentsWidth' => 18,
        /* Number of vertical segments. */
        'segmentsHeight' => 36,
        /* Horizontal starting angle. */
        'phiStart' => 0,
        /* Horizontal sweep angle size. */
        'phiLength' => 360,
        /* Vertical starting angle. */
        'thetaStart' => 0,
        /* Vertical sweep angle size. */
        'thetaLength' => 360
    );

    /**
     * Radius of the sphere.
     *
     * @param array $dom_attributes            
     * @param float|int $radius            
     * @return void
     */
    public function radius(array &$dom_attributes, float $radius)
    {
        $dom_attributes['radius'] = $radius;
    }

    /**
     * Number of vertical segments.
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
     * Number of horizontal segments.
     *
     * @param array $dom_attributes            
     * @param int $segmentsWidth            
     * @return void
     */
    public function segmentsWidth(array &$dom_attributes, int $segmentsWidth)
    {
        $dom_attributes['segmentsWidth'] = $segmentsWidth;
    }

    /**
     * Horizontal starting angle.
     *
     * @param array $dom_attributes            
     * @param float|int $phiStart            
     * @return void
     */
    public function phiStart(array &$dom_attributes, float $phiStart)
    {
        $dom_attributes['phiStart'] = $phiStart;
    }

    /**
     * Horizontal sweep angle size.
     *
     * @param array $dom_attributes            
     * @param float|int $phiLength            
     * @return void
     */
    public function phiLength(array &$dom_attributes, float $phiLength = null)
    {
        $dom_attributes['phiLength'] = $phiLength;
    }

    /**
     * Vertical starting angle.
     *
     * @param array $dom_attributes            
     * @param float|int $thetaStart            
     * @return void
     */
    public function thetaStart(array &$dom_attributes, float $thetaStart)
    {
        $dom_attributes['thetaStart'] = $thetaStart;
    }

    /**
     * Vertical sweep angle size.
     *
     * @param array $dom_attributes            
     * @param float|int $thetaLength            
     * @return void
     */
    public function thetaLength(array &$dom_attributes, float $thetaLength)
    {
        $dom_attributes['thetaLength'] = $thetaLength;
    }
}
