<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 7, 2016 - 9:46:02 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         Curvedimage.php
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

final class Curvedimage extends Entity implements EntityInterface
{

    /**
     * <a-curvedimage>
     *
     * he curved image primitive creates images that bend around the user. Curved images arranged around the camera can
     * be pleasing for legibility since each pixel sits at the same distance from the user. They can be a better choice
     * than angled flat planes for complex layouts because they ensure a smooth surface rather than a series of awkward
     * seams between planes. It is an entity that prescribes a double-sided open-ended cylinder with the geometry
     * component and rendering textures on the inside of the cylinder with the material component.
     *
     * @return void
     */
    public function reset()
    {
        parent::reset();
        $this->component('Geometry')->primitive('cylinder');
        $this->component('Geometry')->height(1);
        $this->component('Geometry')->radius(2);
        $this->component('Geometry')->segmentsRadial(48);
        $this->component('Geometry')->thetaLength(270);
        $this->component('Geometry')->openEnded(true);
        $this->component('Geometry')->thetaStart(0);
        
        $this->component('Material')->shader('flat');
        $this->color('#fff');
        $this->component('Material')->side('double');
        $this->component('Material')->transparent(true);
        
        $this->component('Material')->shader()->repeat(- 1, 1);
    }
}