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

interface AssetsInterface
{

    /**
     * Asset constructor set asset ID
     *
     * @param string $id            
     * @return void
     */
    public function __construct(string $id);

    /**
     * Set ID attribute of the asset
     *
     * @param string $id            
     * @return void
     */
    public function id(string $id = 'untitled');

    /**
     * Set Assets src attribute
     *
     * @param null|string $src            
     * @return void
     */
    public function src(string $src = null);
}
