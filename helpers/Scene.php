<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 11, 2016 - 1:21:40 AM
 * Contact      marko.kungla@gmail.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * Package name    aframe-php
 * @category       mkungla
 * @package        aframe
 * @subpackage     php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         Scene.inc
 * Code format  PSR-2
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko.kungla@gmail.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace Aframe\helpers;

use \Aframe\helpers\{
    Assets
}


;

final class Scene
{

    private $assetsObj;

    private $entities;

    private $cylinders;

    private $planes;

    private $images;

    public function assets()
    {
        if (! $this->assetsObj instanceof Assets)
            $this->assetsObj = new Assets();
        return $this->assetsObj;
    }

    public function entity(string $ID)
    {
        return $this->entities[$ID] ?? $this->entities[$ID] = new Entity($ID);
    }

    public function cylinder(string $ID)
    {
        return $this->cylinders[$ID] ?? $this->cylinders[$ID] = new Cylinder($ID);
    }

    public function curvedimage(string $ID)
    {
        return $this->curvedimages[$ID] ?? $this->curvedimages[$ID] = new Curvedimage($ID);
    }

    public function plane(string $ID)
    {
        return $this->planes[$ID] ?? $this->planes[$ID] = new Plane($ID);
    }

    public function image(string $ID)
    {
        return $this->images[$ID] ?? $this->images[$ID] = new Image($ID);
    }

    public function getEntities()
    {
        return $this->entities ?? array();
    }

    public function getCylinders()
    {
        return $this->cylinders ?? array();
    }

    public function getCurvedimages()
    {
        return $this->curvedimages ?? array();
    }

    public function getPlanes()
    {
        return $this->planes ?? array();
    }

    public function getImages()
    {
        return $this->images ?? array();
    }
}
 