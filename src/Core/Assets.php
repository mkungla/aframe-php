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
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core;

use \AframeVR\Core\Assets\{
    AssetAudio,
    AssetImage,
    AssetItem,
    AssetVideo,
    Mixin
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
     * Set assets timeout attribute
     *
     * @var int
     */
    protected $attr_timeout;

    /**
     * Asset manager constructor
     *
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->assets_uri = $config->get('assets_uri');
    }

    /**
     * <a-scene><a-assets><audio>
     *
     * @param string $id
     * @return \AframeVR\Interfaces\Core\Assets\AssetAudioInterface
     */
    public function audio(string $id = '0'): \AframeVR\Interfaces\Core\Assets\AssetAudioInterface
    {
        return $this->assets[$id] ?? $this->assets[$id] = new AssetAudio($id, $this->assets_uri);
    }

    /**
     * <a-scene><a-assets><img>
     *
     * @param string $id
     * @return \AframeVR\Interfaces\Core\Assets\AssetImageInterface
     */
    public function img(string $id = '0'): \AframeVR\Interfaces\Core\Assets\AssetImageInterface
    {
        return $this->assets[$id] ?? $this->assets[$id] = new AssetImage($id, $this->assets_uri);
    }

    /**
     * <a-scene><a-assets><a-asset-item>
     *
     * @param string $id
     * @return \AframeVR\Interfaces\Core\Assets\AssetItemInterface
     */
    public function item(string $id = '0'): \AframeVR\Interfaces\Core\Assets\AssetItemInterface
    {
        return $this->assets[$id] ?? $this->assets[$id] = new AssetItem($id, $this->assets_uri);
    }

    /**
     * <a-scene><a-assets><video>
     *
     * @param string $id
     * @return \AframeVR\Interfaces\Core\Assets\AssetVideoInterface
     */
    public function video(string $id = '0'): \AframeVR\Interfaces\Core\Assets\AssetVideoInterface
    {
        return $this->assets[$id] ?? $this->assets[$id] = new AssetVideo($id, $this->assets_uri);
    }

    /**
     * Mixin which will be directly applied to element usin it
     *
     * A-Frame PHP does not create <a-mixin>. Instead it is appling
     * mixin directly on element using this mixin.
     *
     * @param string $id
     * @return \AframeVR\Interfaces\Core\Assets\MixinInterface
     */
    public function mixin(string $id = '0'): \AframeVR\Interfaces\Core\Assets\MixinInterface
    {
        return $this->assets[$id] ?? $this->assets[$id] = new Mixin($id, $this->assets_uri);
    }

    /**
     * Setting a timeout
     *
     * @param int $milliseconds
     * @return Assets
     */
    public function timeout(int $milliseconds = 3000)
    {
        $this->attr_timeout = $milliseconds;
        return $this;
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
