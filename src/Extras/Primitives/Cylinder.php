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
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Extras\Primitives;

use \AframeVR\Core\Entity;
use \AframeVR\Core\Helpers\MeshAttributes;
use \AframeVR\Interfaces\PrimitiveInterface;

/**
 * <a-cylinder>
 *
 * The cylinder primitive is an entity that prescribes the geometry with its geometric primitive set to cylinder.
 * It can be used to create tubes and curved surfaces.
 */
class Cylinder extends Entity implements PrimitiveInterface
{
    use MeshAttributes;

    public function init()
    {
        $this->component('Material');
        $this->component('Geometry')->primitive('cylinder');
        
        /* Load defaults */
    }

    public function height(float $height = 1)
    {
        $this->component('Geometry')->height($height);
        return $this;
    }

    public function openEnded(bool $openEnded = false)
    {
        $this->component('Geometry')->openEnded($openEnded);
        return $this;
    }

    public function radius(float $radius = 0.75)
    {
        $this->component('Geometry')->radius($radius);
        return $this;
    }

    public function segmentsHeight(int $segmentsHeight = 1)
    {
        $this->component('Geometry')->segmentsHeight($segmentsHeight);
        return $this;
    }

    public function segmentsRadial(int $segmentsRadial = 36)
    {
        $this->component('Geometry')->segmentsHeight($segmentsRadial);
        return $this;
    }

    public function thetaLength(int $thetaLength = 360)
    {
        $this->component('Geometry')->thetaLength($thetaLength);
        return $this;
    }

    public function thetaStart(int $thetaStart = 0)
    {
        $this->component('Geometry')->thetaStart($thetaStart);
        return $this;
    }

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
}
