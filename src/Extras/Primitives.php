<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 20, 2016 - 10:21:07 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         Primitives.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Extras;

use \AframeVR\Core\Entity;
trait Primitives
{
    
    /**
     * Aframe Document Object Model
     *
     * @var \AframeVR\Core\DOM\AframeDOMDocument
     */
    protected $aframeDomObj;
    
    /**
     * Children entities
     * 
     * @var array $childrens
     */
    protected $childrens = array();

    /**
     *
     * @var \AframeVR\Extras\Primitives\Sky $sky
     */
    protected $sky;
    
    /**
     *
     * @var \AframeVR\Extras\Primitives\Videosphere $videosphere
     */
    protected $videosphere;
    
    /**
     * A-Frame Primitive sky
     *
     * @return Entity
     */
    public function sky(string $id = 'untitled'): Entity
    {
        return $this->sky = new \AframeVR\Extras\Primitives\Sky($id);
    }

    /**
     * A-Frame Primitive videosphere
     *
     * @return Entity
     */
    public function videosphere(string $id = 'untitled'): Entity
    {
        return $this->videosphere = new \AframeVR\Extras\Primitives\Videosphere($id);
    }

    /**
     * Add all used primitevs to the scene
     *
     * @return void
     */
    protected function preparePrimitives()
    {
        /* Primitive collections */
        $this->aframeDomObj->appendEntities($this->childrens);
        /* Primitives which only one can be present */
        (! $this->sky) ?: $this->aframeDomObj->appendEntity($this->sky);
        (! $this->videosphere) ?: $this->aframeDomObj->appendEntity($this->videosphere);
    }
}
