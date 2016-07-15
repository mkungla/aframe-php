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
 * @issues      https://github.com/mkungla/aframe-php/issues
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
     * @var string
     */
    protected $element_tag = 'a-asset-item';
    protected $attrs = array();
    protected $components = array();
    protected $assets_uri;

    /**
     * Asset constructor set asset ID
     *
     * @param string $id
     */
    public function __construct(string $id, string $assets_uri)
    {
        $this->id($id);
        $this->assets_uri = $assets_uri;
        $this->init();
    }

    public function init()
    {
    }

    /**
     * Set ID attribute of the asset
     *
     * {@inheritdoc}
     *
     * @param string $id
     * @return AssetsInterface
     */
    public function id(string $id = 'untitled'): AssetsInterface
    {
        $this->attrs['id'] = $id;
        return $this;
    }

    /**
     * Set Assets src attribute
     *
     * {@inheritdoc}
     *
     * @param null|string $src
     * @return AssetsInterface
     */
    public function src(string $src = null): AssetsInterface
    {
        $this->attrs['src'] = $this->assets_uri ? $this->assets_uri . $src : $src;
        return $this;
    }

    /**
     * Create and add DOM element of the asset
     *
     * @param \DOMDocument $aframe_dom
     * @return \DOMElement
     */
    public function domElement(\DOMDocument &$aframe_dom): DOMElement
    {
        $a_asset = $aframe_dom->createElement($this->element_tag);
        /* Asset must have a id */
        $this->appendAttributes($a_asset);

        foreach ($this->components as $component) {
            /*
             * Check does component has any attributes to add to DOM element.
             * default attributes most of cases are ommited so we might not have any attributes to add
             */
            if ($component->hasDOMAttributes())
                $a_asset->setAttributeNode($component->getDOMAttr());
        }

        return $a_asset;
    }

    /**
     * Set Dom element name
     *
     * @param string $element_tag
     * @return void
     */
    public function setDomElementTag(string $element_tag)
    {
        $this->element_tag = $element_tag;
    }

    /**
     * Append DOM attributes no set by components
     *
     * @param \DOMElement $a_entity
     */
    private function appendAttributes(\DOMElement &$a_entity)
    {
        foreach ($this->attrs as $attr => $val) {
            $this->setAttribute($a_entity, $attr, $val);
        }
    }

    private function setAttribute(&$a_entity, $attr, $val)
    {
        if ($attr === 'id' && ($val === 'untitled' || is_numeric($val)))
            return;

        $a_entity->setAttribute($attr, $val);
    }
}
