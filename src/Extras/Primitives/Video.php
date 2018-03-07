<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 7, 2016 - 5:36:48 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         Video.php
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

class Video extends Entity implements EntityInterface
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
        parent::reset();
        $this->attr('Material')->shader('flat');
        $this->color('#FFF');
        $this->attr('Material')->side('double');
        $this->attr('Material')->transparent(true);
        
        $this->attr('Geometry')->primitive('plane');
        $this->height(1.75);
        $this->width(3);
    }

    /**
     * geometry.height
     *
     * @param float $height            
     * @return Video
     */
    public function height(float $height)
    {
        $this->attr('Geometry')->height($height);
        return $this;
    }

    /**
     * geometry.width
     *
     * @param float $width            
     * @return Video
     */
    public function width(float $width)
    {
        $this->attr('Geometry')->width($width);
        return $this;
    }
}