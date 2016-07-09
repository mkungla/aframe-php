<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 3, 2016 - 7:08:14 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         AssetVideo.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Assets;

use \AframeVR\Interfaces\Core\Assets\AssetVideoInterface;
use \AframeVR\Core\Helpers\AssetsAbstract;

final class AssetVideo extends AssetsAbstract implements AssetVideoInterface
{

    /**
     * Autoplay video
     *
     * @var bool
     */
    protected $attr_autoplay;

    /**
     * Preload video
     *
     * @var string
     */
    protected $attr_preload;

    /**
     * Image crossorigin
     *
     * @var string
     */
    protected $attr_crossorigin;
    
    /**
     * Asset constructor set asset ID
     *
     * @param string $id            
     */
    public function __construct(string $id)
    {
        $this->id($id);
        $this->setDomElementTag('video');
    }

    /**
     * Autoplay video
     *
     * @param bool $autoplay            
     * @return AssetVideoInterface
     */
    public function autoplay(bool $autoplay = true): AssetVideoInterface
    {
        $this->attrs['autoplay'] = $autoplay ? 'true' : 'false';
        return $this;
    }

    /**
     * loop video
     *
     * @param string $loop            
     * @return AssetVideoInterface
     */
    public function loop(bool $loop = true): AssetVideoInterface
    {
        $this->attrs['loop'] = $loop ? 'true' : 'false';
        return $this;
    }
    
    /**
     * Preload video
     *
     * @param string $preload
     * @return AssetVideoInterface
     */
    public function preload(string $preload = 'auto'): AssetVideoInterface
    {
        $this->attrs['preload'] = $preload;
        return $this;
    }

    /**
     * Set crossorigin attribute of the video
     *
     * @param string $crossorigin            
     * @return AssetVideoInterface
     */
    public function crossorigin(string $crossorigin = 'anonymous'): AssetVideoInterface
    {
        $this->attrs['crossorigin'] = $crossorigin;
        return $this;
    }
}
