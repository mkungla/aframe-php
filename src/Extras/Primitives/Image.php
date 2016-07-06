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

use \AframeVR\Interfaces\Extras\Primitives\ImagePrimitiveIF;

class Image extends Plane implements ImagePrimitiveIF
{

    public function init()
    {
        parent::init();
        $this->component('Material')->shader('flat');
        $this->component('Material')->side('double');
        $this->color('#FFF');
        $this->transparent(true);
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
        $this->height(1.75);
        $this->width(1.75);
    }
}