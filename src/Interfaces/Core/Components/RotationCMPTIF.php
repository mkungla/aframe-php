<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 28, 2016 - 9:04:41 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         RotationCMPTIF.php
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
 * Rotation Component Interface
 *
 * The rotation component defines the orientation of an entity. It takes the roll (x), pitch (y), and yaw (z) as three
 * space-delimited numbers indicating degrees of rotation.
 */
interface RotationCMPTIF extends ComponentInterface
{

    /**
     * Roll, rotation about the X-axis.
     *
     * @param double $roll            
     * @return void
     */
    public function roll(float $roll);

    /**
     * Pitch, rotation about the Y-axis.
     *
     * @param double $pitch            
     * @return void
     */
    public function pitch(float $pitch);

    /**
     * Yaw, rotation about the Z-axis.
     *
     * @param double $yaw            
     * @return void
     */
    public function yaw(float $yaw);
}