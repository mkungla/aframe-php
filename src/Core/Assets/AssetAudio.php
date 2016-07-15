<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 3, 2016 - 6:02:37 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         AssetAudio.php
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

use \AframeVR\Interfaces\Core\Assets\AssetAudioInterface;
use \AframeVR\Core\Helpers\AssetsAbstract;

final class AssetAudio extends AssetsAbstract implements AssetAudioInterface
{

    /**
     * Autoplay audio
     *
     * @var bool
     */
    protected $attr_autoplay;

    /**
     * Preload audio
     *
     * @var string
     */
    protected $attr_preload;

    public function init()
    {
        $this->setDomElementTag('audio');
    }

    /**
     * Autoplay audio
     *
     * @param bool $autoplay            
     * @return AssetAudioInterface
     */
    public function autoplay(bool $autoplay = true): AssetAudioInterface
    {
        $this->attr_autoplay = $autoplay;
        return $this;
    }

    /**
     * Preload audio
     *
     * @param string $preload            
     * @return AssetAudioInterface
     */
    public function preload(string $preload = 'auto'): AssetAudioInterface
    {
        $this->attr_preload = $preload;
        return $this;
    }
}
