<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 4, 2016 - 4:22:41 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         ColladaModel.php
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

class ColladaModel extends Entity implements EntityInterface
{

    /**
     * Init <a-collada-model>
     *
     * The COLLADA model primitive displays a 3D COLLADA model created from a 3D modeling program or downloaded from
     * the web. It is an entity that maps the src attribute to the collada-model component.
     *
     * @return void
     */
    public function reset()
    {
        parent::reset();
        $this->child()->entity()->component('ColladaModel');
    }

    /**
     * Rotation component
     *
     * Apply rotation on child instead
     *
     * @param int|float $roll            
     * @param int|float $pitch            
     * @param int|float $yaw            
     * @return EntityInterface
     */
    public function rotation(float $roll = 0, float $pitch = 0, float $yaw = 0): EntityInterface
    {
        $this->child()->entity()->rotation($roll, $pitch, $yaw);
        return $this;
    }

    /**
     * Scale component
     *
     * Apply scale on child intead
     *
     * @param int|float $scale_x            
     * @param int|float $scale_y            
     * @param int|float $scale_z            
     * @return EntityInterface
     */
    public function scale(float $scale_x = 1, float $scale_y = 1, float $scale_z = 1): EntityInterface
    {
        $this->child()->entity()->scale($scale_x, $scale_y, $scale_z);
        return $this;
    }

    /**
     * ColladaModel.src
     *
     * @param null|string $src            
     * @return EntityInterface
     */
    public function src(string $src = null): EntityInterface
    {
        $this->child()
            ->entity()
            ->component('ColladaModel')
            ->src($src);
        return $this;
    }
}
 