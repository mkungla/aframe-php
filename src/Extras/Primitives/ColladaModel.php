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

use \AframeVR\Interfaces\Extras\Primitives\ColladaModelPrimitiveIF;
use \AframeVR\Core\Entity;
use \AframeVR\Core\Helpers\MeshAttributes;

class ColladaModel extends Entity implements ColladaModelPrimitiveIF
{
    use MeshAttributes;

    /**
     * Init <a-box>
     *
     * The box primitive, formerly called <a-cube>, creates shapes such as boxes, cubes, or walls.
     * It is an entity that prescribes the geometry with its geometric primitive set to box.
     *
     * {@inheritdoc}
     *
     * @return void
     */
    public function init()
    {
        $this->child()->entity()->component('ColladaModel');
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
    }

    /**
     * Rotation component
     *
     * {@inheritdoc}
     *
     * @param int|float $roll            
     * @param int|float $pitch            
     * @param int|float $yaw            
     * @return Entity
     */
    public function rotation(float $roll = 0, float $pitch = 0, float $yaw = 0): Entity
    {
        $this->child()->entity()->rotation($roll, $pitch, $yaw);
        return $this;
    }

    /**
     * Scale component
     *
     * {@inheritdoc}
     *
     * @param int|float $scale_x            
     * @param int|float $scale_y            
     * @param int|float $scale_z            
     * @return Entity
     */
    public function scale(float $scale_x = 1, float $scale_y = 1, float $scale_z = 1): Entity
    {
        $this->child()->entity()->scale($scale_x, $scale_y, $scale_z);
        return $this;
    }

    /**
     * ColladaModel.src
     *
     * @param null|string $src            
     * @return ColladaModelPrimitiveIF
     */
    public function src(string $src = null): ColladaModelPrimitiveIF
    {
        $this->child()
            ->entity()
            ->component('ColladaModel')
            ->src($src);
        return $this;
    }
}
 