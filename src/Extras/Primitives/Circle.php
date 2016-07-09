<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 9, 2016 - 2:53:15 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         Circle.php
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

class Circle extends Entity implements EntityInterface
{

    /**
     * Init <a-circle>
     *
     * @return void
     */
    public function reset()
    {
        parent::reset();
        $this->component('Geometry')->primitive('circle');
    }

    /**
     * geometry.radius
     *
     * @param float $radius            
     * @return \AframeVR\Extras\Primitives\Circle
     */
    public function radius(float $radius)
    {
        $this->component('Geometry')->radius($radius);
        return $this;
    }

    /**
     * geometry.segments
     *
     * @param int $segments            
     * @return \AframeVR\Extras\Primitives\Circle
     */
    public function segments(float $segments)
    {
        $this->component('Geometry')->segments($segments);
        return $this;
    }

    /**
     * geometry.thetaLength
     *
     * @param float $theta_length            
     * @return \AframeVR\Extras\Primitives\Circle
     */
    public function thetaLength(float $theta_length)
    {
        $this->component('Geometry')->thetaLength($theta_length);
        return $this;
    }

    /**
     * geometry.thetaStart
     *
     * @param int $theta_start            
     * @return \AframeVR\Extras\Primitives\Circle
     */
    public function thetaStart(float $theta_start)
    {
        $this->component('Geometry')->thetaStart($theta_start);
        return $this;
    }
}