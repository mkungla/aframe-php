<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 28, 2016 - 8:58:18 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         PositionCMPTIF.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Interfaces\Core\Components;

use \AframeVR\Interfaces\ComponentInterface;

/**
 * Position Component Interface
 *
 * The position component defines where an entity is placed in the scene’s world space. It takes a coordinate value as
 * three space-delimited numbers.
 */
interface PositionCMPTIF extends ComponentInterface
{

    /**
     * Get current position coordinates
     *
     * @return string
     */
    public function getPosition(): string;

    /**
     * Negative X axis extends left.
     * Positive X Axis extends right.
     *
     * @param float $x_axis            
     * @return PositionCMPTIF
     */
    public function positionX(float $x_axis): PositionCMPTIF;

    /**
     * Negative Y axis extends up.
     * Positive Y Axis extends down.
     *
     * @param float $y_axis            
     * @return PositionCMPTIF
     */
    public function positionY(float $y_axis): PositionCMPTIF;

    /**
     * Negative Z axis extends in.
     * Positive Z Axis extends out.
     *
     * @param float $z_axis            
     * @return PositionCMPTIF
     */
    public function positionZ(float $z_axis): PositionCMPTIF;
}
