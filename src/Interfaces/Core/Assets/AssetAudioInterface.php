<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 3, 2016 - 6:20:01 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         AssetAudioInterface.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Interfaces\Core\Assets;

interface AssetAudioInterface
{

    /**
     * Autoplay video
     *
     * @param bool $autoplay            
     * @return AssetAudioInterface
     */
    public function autoplay(bool $autoplay = true): AssetAudioInterface;

    /**
     * Preload video
     *
     * @param string $preload            
     * @return AssetAudioInterface
     */
    public function preload(string $preload = 'auto'): AssetAudioInterface;
}
