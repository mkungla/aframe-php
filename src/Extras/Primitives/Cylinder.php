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

use \AframeVR\Interfaces\Extras\Primitives\CylinderPrimitiveIF;
use \AframeVR\Core\Entity;
use \AframeVR\Core\Helpers\MeshAttributes;

/**
 * <a-cylinder>
 *
 * The cylinder primitive is an entity that prescribes the geometry with its geometric primitive set to cylinder.
 * It can be used to create tubes and curved surfaces.
 */
class Cylinder extends Entity implements CylinderPrimitiveIF
{
    use MeshAttributes;

    /**
     * Init
     *
     * {@inheritdoc}
     *
     * @return void
     */
    public function init()
    {
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
        $this->height();
        $this->openEnded();
        $this->radius();
        $this->segmentsHeight();
        $this->segmentsRadial();
        $this->thetaLength();
        $this->thetaStart();
    }

    /**
     * geometry.height
     *
     * {@inheritdoc}
     *
     * @param int|float $height            
     * @return CylinderPrimitiveIF
     */
    public function height(float $height = 1): CylinderPrimitiveIF
    {
        $this->component('Geometry')->height($height);
        return $this;
    }

    /**
     * geometry.openEnded
     *
     * {@inheritdoc}
     *
     * @param bool $openEnded            
     * @return CylinderPrimitiveIF
     */
    public function openEnded(bool $openEnded = false): CylinderPrimitiveIF
    {
        $this->component('Geometry')->openEnded($openEnded);
        return $this;
    }

    /**
     * geometry.radius
     *
     * {@inheritdoc}
     *
     * @param float $radius            
     * @return CylinderPrimitiveIF
     */
    public function radius(float $radius = 0.75): CylinderPrimitiveIF
    {
        $this->component('Geometry')->radius($radius);
        return $this;
    }

    /**
     * geometry.segmentsHeight
     *
     * {@inheritdoc}
     *
     * @param int $segmentsHeight            
     * @return CylinderPrimitiveIF
     */
    public function segmentsHeight(int $segmentsHeight = 1): CylinderPrimitiveIF
    {
        $this->component('Geometry')->segmentsHeight($segmentsHeight);
        return $this;
    }

    /**
     * geometry.segmentsRadial
     *
     * {@inheritdoc}
     *
     * @param int $segmentsRadial            
     * @return CylinderPrimitiveIF
     */
    public function segmentsRadial(int $segmentsRadial = 36): CylinderPrimitiveIF
    {
        $this->component('Geometry')->segmentsHeight($segmentsRadial);
        return $this;
    }

    /**
     * geometry.thetaLength
     *
     * {@inheritdoc}
     *
     * @param int $thetaLength            
     * @return CylinderPrimitiveIF
     */
    public function thetaLength(int $thetaLength = 360): CylinderPrimitiveIF
    {
        $this->component('Geometry')->thetaLength($thetaLength);
        return $this;
    }

    /**
     * geometry.thetaStart
     *
     * {@inheritdoc}
     *
     * @param int $thetaStart            
     * @return CylinderPrimitiveIF
     */
    public function thetaStart(int $thetaStart = 0): CylinderPrimitiveIF
    {
        $this->component('Geometry')->thetaStart($thetaStart);
        return $this;
    }
}
