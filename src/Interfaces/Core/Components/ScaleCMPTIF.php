<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 28, 2016 - 9:06:41 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         ScaleCMPTIF.php
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
 * Scale Component Interface
 *
 * The scale component defines a shrinking, stretching, or skewing transformation of an entity. It takes three scaling
 * factors for the X, Y, and Z axes.
 */
interface ScaleCMPTIF extends ComponentInterface
{

    /**
     * Scaling factor in the X direction.
     *
     * @param double $scale_x            
     * @return ScaleCMPTIF
     */
    public function scaleX(float $scale_x): ScaleCMPTIF;

    /**
     * Scaling factor in the Y direction..
     *
     * @param double $scale_y            
     * @return ScaleCMPTIF
     */
    public function scaleY(float $scale_y): ScaleCMPTIF;

    /**
     * Scaling factor in the Z direction.
     *
     * @param double $scale_z            
     * @return ScaleCMPTIF
     */
    public function scaleZ(float $scale_z): ScaleCMPTIF;

    /**
     * Get scale
     *
     * @return string
     */
    public function getScale(): string;
}