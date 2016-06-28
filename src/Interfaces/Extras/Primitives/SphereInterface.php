<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 28, 2016 - 10:25:31 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         SphereInterface.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Interfaces\Extras\Primitives;

use \AframeVR\Interfaces\PrimitiveInterface;

interface SphereInterface extends PrimitiveInterface
{

    /**
     * geometry.radius
     *
     * @param float $radius            
     * @return \AframeVR\Interfaces\Extras\Primitives\SphereInterface
     */
    public function radius(float $radius = 0.85): SphereInterface;

    /**
     * geometry.segmentsHeight
     *
     * @param int $segmentsHeigh            
     * @return \AframeVR\Interfaces\Extras\Primitives\SphereInterface
     */
    public function segmentsHeight($segmentsHeigh = 18): SphereInterface;

    /**
     * geometry.segmentsWidth
     *
     * @param int $segmentsWidth            
     * @return \AframeVR\Interfaces\Extras\Primitives\SphereInterface
     */
    public function segmentsWidth($segmentsWidth = 36): SphereInterface;
}
