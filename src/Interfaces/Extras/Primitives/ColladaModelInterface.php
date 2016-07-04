<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 4, 2016 - 5:48:13 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         ColladaModelInterface.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Interfaces\Extras\Primitives;

use \AframeVR\Interfaces\PrimitiveInterface;

interface ColladaModelInterface extends PrimitiveInterface
{
    /**
     * Rotation component
     *
     * Apply rotation on child instead
     *
     * @param int|float $roll
     * @param int|float $pitch
     * @param int|float $yaw
     * @return \AframeVR\Core\Entity
     */
    public function rotation(float $roll = 0, float $pitch = 0, float $yaw = 0): \AframeVR\Core\Entity;
    
    /**
     * Scale component
     *
     * Apply scale on child intead
     *
     * @param int|float $scale_x
     * @param int|float $scale_y
     * @param int|float $scale_z
     * @return \AframeVR\Core\Entity
     */
    public function scale(float $scale_x = 1, float $scale_y = 1, float $scale_z = 1): \AframeVR\Core\Entity;
    
    /**
     * ColladaModel.src
     *
     * @param null|string $src
     * @return ColladaModelInterface
     */
    public function src(string $src = null): ColladaModelInterface;
}
