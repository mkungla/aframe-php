<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 20, 2016 - 9:08:14 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         Assets.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core;

use \AframeVR\Interfaces\{
    AssetsInterface,
    MixinInterface
};
use \AframeVR\Core\Mixin;

final class Assets implements AssetsInterface
{

    protected $mixins;

    /**
     * mixin
     *
     * @param string $name            
     * @return \AframeVR\Interfaces\MixinInterface
     */
    public function mixin(string $name = 'untitled'): MixinInterface
    {
        return $this->mixins[$name] ?? $this->mixins[$name] = new Mixin();
    }
}
 