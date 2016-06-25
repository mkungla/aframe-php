<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 25, 2016 - 7:18:04 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         ScaleComponentInterface.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Interfaces\Components;

use \AframeVR\Interfaces\ComponentInterface;

interface ScaleComponentInterface extends ComponentInterface
{

    /**
     * Update scale
     *
     * If any of the scaling factors are set to 0, then A-Frame will
     * assign instead an extremely small value such that things don’t break.
     *
     * @param integer|double $x            
     * @param integer|double $y            
     * @param integer|double $z            
     */
    public function update(float $x = 0, float $y = 0, float $z = 0);
}
 