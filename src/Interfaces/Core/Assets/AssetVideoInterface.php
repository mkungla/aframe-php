<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 3, 2016 - 7:10:37 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         AssetVideoInterface.php
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

interface AssetVideoInterface
{

    /**
     * Set crossorigin attribute of the video
     *
     * @param string $crossorigin            
     * @return AssetVideoInterface
     */
    public function crossorigin(string $crossorigin = 'anonymous'): AssetVideoInterface;

    /**
     * Autoplay video
     *
     * @param bool $autoplay            
     * @return AssetVideoInterface
     */
    public function autoplay(bool $autoplay = true): AssetVideoInterface;

    /**
     * Preload video
     *
     * @param string $preload            
     * @return AssetVideoInterface
     */
    public function preload(string $preload = 'auto'): AssetVideoInterface;
}
