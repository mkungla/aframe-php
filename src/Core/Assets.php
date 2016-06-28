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

use \AframeVR\Interfaces\Core\Assets\{
    ItemInterface,
    MixinInterface
};
use \AframeVR\Core\Assets\{
    Mixin,
    Item
};

final class Assets
{

    /**
     * Array of mixins
     *
     * @var array
     */
    protected $assets;

    /**
     * mixin
     *
     * @param string $name            
     * @return \AframeVR\Interfaces\Assets\MixinInterface
     */
    public function mixin(string $name = 'untitled'): MixinInterface
    {
        return $this->assets[$name] ?? $this->assets[$name] = new Mixin($name);
    }

    /**
     * mixin
     *
     * @param string $name            
     * @return \AframeVR\Interfaces\Assets\ItemInterface
     */
    public function item(string $name = 'untitled'): ItemInterface
    {
        return $this->assets[$name] ?? $this->assets[$name] = new Item($name);
    }

    /**
     * Get all assets
     *
     * @return array|null
     */
    public function getAssets()
    {
        return $this->assets;
    }
}
