<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 3, 2016 - 6:22:51 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         AssetImage.php
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

use \AframeVR\Interfaces\Core\Assets\AssetImageInterface;
use \AframeVR\Core\Helpers\AssetsAbstract;

final class AssetImage extends AssetsAbstract implements AssetImageInterface
{

    /**
     * Image crossorigin
     *
     * @var string
     */
    protected $attr_crossorigin;

    /**
     * Image crossorigin
     *
     * Asset constructor set asset ID
     *
     * @param string $id            
     */
    public function __construct(string $id)
    {
        $this->id($id);
        $this->setDomElementTag('img');
    }

    /**
     * Set crossorigin attribute of the image
     *
     * @param string $crossorigin            
     * @return AssetImageInterface
     */
    public function crossorigin(string $crossorigin = 'anonymous'): AssetImageInterface
    {
        $this->attr_crossorigin = $crossorigin;
        return $this;
    }
}
