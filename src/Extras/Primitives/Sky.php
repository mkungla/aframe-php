<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 21, 2016 - 12:35:01 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         Sky.php
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

use \AframeVR\Interfaces\Extras\Primitives\SkyPrimitiveIF;
use \AframeVR\Extras\Primitives\Sphere;

/**
 * <a-sky>
 *
 * The sky primitive adds a background to a scene or display a 360-degree photo.
 * It is an entity that prescribes a large sphere with the material mapped to the inside.
 */
final class Sky extends Sphere implements SkyPrimitiveIF
{

    /**
     * Set defaults
     *
     * {@inheritdoc}
     *
     * @return void
     */
    public function defaults()
    {
        $this->radius(100);
        $this->segmentsHeight(20);
        $this->segmentsWidth(64);
    }
}
