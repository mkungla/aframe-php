<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 8, 2016 - 3:16:33 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         Cone.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Extras\Primitives;

use \AframeVR\Core\Entity;
use \AframeVR\Interfaces\EntityInterface;

final class Cone extends Entity implements EntityInterface
{

    /**
     * <a-cone>
     *
     * The cone primitive creates a cone shape. It is an entity that prescribes the geometry with its geometric
     * primitive set to cone.
     *
     * @return void
     */
    public function reset()
    {
        parent::reset();
        $this->component('Geometry')->primitive('cone');
    }

    /**
     * geometry.height
     *
     * @param int $height            
     * @return \AframeVR\Extras\Primitives\Cone
     */
    public function height(int $height)
    {
        $this->component('Geometry')->height(1);
        return $this;
    }

    /**
     * geometry.openEnded
     *
     * @param bool $open_ended            
     * @return \AframeVR\Extras\Primitives\Cone
     */
    public function openEnded(bool $open_ended)
    {
        $this->component('Geometry')->openEnded($open_ended);
        return $this;
    }

    /**
     * geometry.radiusBottom
     *
     * @param float $radius            
     * @return \AframeVR\Extras\Primitives\Cone
     */
    public function radiusBottom(float $radius)
    {
        $this->component('Geometry')->radiusBottom($radius);
        return $this;
    }

    /**
     * geometry.radiusTop
     *
     * @param float $radius            
     * @return \AframeVR\Extras\Primitives\Cone
     */
    public function radiusTop(float $radius)
    {
        $this->component('Geometry')->radiusTop($radius);
        return $this;
    }

    /**
     * geometry.segmentsHeight
     *
     * @param int $s_height            
     * @return \AframeVR\Extras\Primitives\Cone
     */
    public function segmentsHeight(int $s_height)
    {
        $this->component('Geometry')->segmentsHeight($s_height);
        return $this;
    }

    /**
     * geometry.segmentsRadial
     *
     * @param in $s_radial            
     * @return \AframeVR\Extras\Primitives\Cone
     */
    public function segmentsRadial(int $s_radial)
    {
        $this->component('Geometry')->segmentsRadial($s_radial);
        return $this;
    }

    /**
     * geometry.thetaLength
     * 
     * @param float $t_lenght
     * @return \AframeVR\Extras\Primitives\Cone
     */
    public function thetaLength(float $t_lenght)
    {
        $this->component('Geometry')->thetaLength(360);
        return $this;
    }

    /**
     * geometry.thetaStart
     * 
     * @param float $t_start
     * @return \AframeVR\Extras\Primitives\Cone
     */
    public function thetaStart(float $t_start)
    {
        $this->component('Geometry')->thetaStart(0);
        return $this;
    }
}