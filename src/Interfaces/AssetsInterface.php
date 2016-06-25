<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 25, 2016 - 5:44:02 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         AssetsInterface.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Interfaces;

use \AframeVR\Interfaces\MixinInterface;

interface AssetsInterface
{

    /**
     * Mixin
     * 
     * @param string $name            
     * @return MixinInterface
     */
    public function mixin(string $name = 'untitled'): MixinInterface;
}
 