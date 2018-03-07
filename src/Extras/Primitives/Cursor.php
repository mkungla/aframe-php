<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 7, 2016 - 10:51:16 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         Cursor.php
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

final class Cursor extends Entity implements EntityInterface
{

    /**
     * <a-cursor>
     *
     * The cursor primitive places a reticle or crosshair to add clicking and interactivity with the scene. It is an
     * entity that prescribes the cursor component and a default ring-shaped geometry. The cursor is usually placed as
     * a child of the camera.
     * 
     * @return void
     */
    public function reset()
    {
        parent::reset();
        $this->attr('Geometry')->primitive('ring');
        $this->attr('Geometry')->radiusOuter(0.016);
        $this->attr('Geometry')->radiusInner(0.01);
        $this->attr('Geometry')->segmentsTheta(64);
        
        $this->attr('Material')->shader('flat');
        $this->color('#000');
        $this->attr('Material')->opacity(0.8);
        
        $this->position(0, 0, - 1);
        
        $this->attr('Cursor')->fuse(true);
        $this->attr('Raycaster')->far(1000);
        $this->attr('Cursor')->fuseTimeout(1500);
    }
}