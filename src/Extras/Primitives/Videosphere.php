<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 7, 2016 - 4:51:28 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         Videosphere.php
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

class Videosphere extends Entity implements EntityInterface
{

    /**
     * Init <a-video>
     *
     * The video primitive displays a video on a flat plane as a texture. It is an entity that prescribes the geometry
     * with its geometric primitive set to plane.
     *
     * @return void
     */
    public function reset()
    {
        $this->component('Material')->shader('flat');
        $this->color('#FFF');
        
        $this->component('Geometry')->primitive('sphere');
        $this->radius(5000);
        $this->segmentsHeight(64);
        $this->segmentsWidth(20);
        
        $this->scale(- 1, 1, 1);
    }

    /**
     * geometry.radius
     *
     * @param float $radius            
     * @return self
     */
    public function radius(float $radius = 100): self
    {
        $this->component('Geometry')->radius($radius);
        return $this;
    }

    /**
     * Autoplay video
     *
     * @param bool $autoplay            
     * @return self
     */
    public function autoplay(bool $autoplay = true): self
    {
        $this->attrs['autoplay'] = $autoplay ? 'true' : 'false';
        return $this;
    }

    /**
     * geometry.segmentsHeight
     *
     * @param int $segmentsHeigh            
     * @return self
     */
    public function segmentsHeight($segmentsHeigh = 64): self
    {
        $this->component('Geometry')->segmentsHeight($segmentsHeigh);
        return $this;
    }

    /**
     * geometry.segmentsWidth
     *
     * @param int $segmentsWidth            
     * @return self
     */
    public function segmentsWidth($segmentsWidth = 64): self
    {
        $this->component('Geometry')->segmentsWidth($segmentsWidth);
        return $this;
    }
}
