<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 28, 2016 - 3:47:35 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         AssetsAbstract.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Helpers;

use \AframeVR\Interfaces\AssetsInterface;
use \DOMElement;

abstract class AssetsAbstract implements AssetsInterface
{

    /**
     * DOM tag name of asset item
     *
     * @var string $element_name
     */
    protected $element_name = 'a-asset-item';

    /**
     * ID attribute
     *
     * @var string
     */
    protected $attr_id;

    /**
     * SRC attribute
     *
     * @var stringZ
     */
    protected $attr_src;

    /**
     * Asset constructor set asset ID
     *
     * @param string $id            
     */
    public function __construct(string $id)
    {
        $this->id($id);
    }

    /**
     * Set ID attribute of the asset
     *
     * {@inheritdoc}
     *
     * @param string $id            
     */
    public function id(string $id = 'untitled')
    {
        $this->attr_id = $id;
    }

    /**
     * Set Assets src attribute
     *
     * {@inheritdoc}
     *
     * @param null|string $src            
     * @return void
     */
    public function src(string $src = null)
    {
        $this->attr_src = $src;
    }

    /**
     * Create and add DOM element of the asset
     *
     * @param \DOMDocument $aframe_dom            
     * @return \DOMElement
     */
    public function DOMElement(&$aframe_dom): DOMElement
    {
        $a_asset = $aframe_dom->createElement($this->element_name);
        $a_asset->setAttribute('id', $this->attr_id);
        // $a_asset->setAttributeNode($this->idDOMAttr());
        return $a_asset;
    }
}
