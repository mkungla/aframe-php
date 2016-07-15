<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 6, 2016 - 2:28:38 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         Image.php
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
use \AframeVR\Interfaces\EntityInterface;

class Image extends Plane implements EntityInterface
{

    /**
     * <a-plane>
     *
     * The plane primitive creates flat surfaces. It is an entity that prescribes the geometry with its geometric
     * primitive set to plane.
     * 
     * @return void
     */
    public function reset()
    {
        parent::reset();
        $this->attr('Material')->shader('flat');
        $this->attr('Material')->side('double');
        $this->color('#FFF');
        $this->transparent(true);
        $this->height(1.75);
        $this->width(1.75);
    }
}