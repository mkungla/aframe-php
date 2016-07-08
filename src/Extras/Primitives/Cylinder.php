<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 21, 2016 - 12:24:13 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         Cylinder.php
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

class Cylinder extends Entity implements EntityInterface
{

    /**
     * <a-cylinder>
     *
     * The cylinder primitive is an entity that prescribes the geometry with its geometric primitive set to cylinder.
     * It can be used to create tubes and curved surfaces.
     * 
     * @return void
     */
    public function reset()
    {
        parent::reset();
        $this->component('Material');
        $this->component('Geometry')->primitive('cylinder');
    }

    /**
     * Set defaults
     *
     * {@inheritdoc}
     *
     * @return void
     */
    public function defaults()
    {
        $this->height(1);
        $this->openEnded(false);
        $this->radius(1);
        $this->segmentsHeight(18);
        $this->segmentsRadial(36);
        $this->thetaLength(360);
        $this->thetaStart(0);
    }

    /**
     * geometry.height
     *
     * @param int|float $height            
     * @return self
     */
    public function height(float $height): self
    {
        $this->component('Geometry')->height($height);
        return $this;
    }

    /**
     * geometry.openEnded
     *
     * @param bool $openEnded            
     * @return self
     */
    public function openEnded(bool $openEnded = false): self
    {
        $this->component('Geometry')->openEnded($openEnded);
        return $this;
    }

    /**
     * geometry.radius
     *
     * @param float $radius            
     * @return self
     */
    public function radius(float $radius = 0.75): self
    {
        $this->component('Geometry')->radius($radius);
        return $this;
    }

    /**
     * geometry.segmentsHeight
     *
     * @param int $segmentsHeight            
     * @return self
     */
    public function segmentsHeight(int $segmentsHeight = 1): self
    {
        $this->component('Geometry')->segmentsHeight($segmentsHeight);
        return $this;
    }

    /**
     * geometry.segmentsRadial
     *
     * @param int $segmentsRadial            
     * @return self
     */
    public function segmentsRadial(int $segmentsRadial = 36): self
    {
        $this->component('Geometry')->segmentsHeight($segmentsRadial);
        return $this;
    }

    /**
     * geometry.thetaLength
     *
     * @param int $thetaLength            
     * @return self
     */
    public function thetaLength(int $thetaLength = 360): self
    {
        $this->component('Geometry')->thetaLength($thetaLength);
        return $this;
    }

    /**
     * geometry.thetaStart
     *
     * @param int $thetaStart            
     * @return self
     */
    public function thetaStart(int $thetaStart = 0): self
    {
        $this->component('Geometry')->thetaStart($thetaStart);
        return $this;
    }
}
