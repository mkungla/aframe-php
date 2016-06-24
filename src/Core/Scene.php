<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 20, 2016 - 9:01:22 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         Scene.php
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

use \AframeVR\Core\Helpers\MetaTags;
use \AframeVR\Extras\Primitives;
use \DOMImplementation;

final class Scene
{
    use Primitives;

    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Scene DOMDocument meta tags object
     *
     * @return \AframeVR\Core\Helpers\MetaTags
     */
    public function meta()
    {
        return $this->meta ?? $this->meta = new MetaTags();
    }

    /**
     * Render the A-Frame scene
     *
     * @param string $full            
     */
    public function render($full = true)
    {
        $dom = new DOMImplementation();
        $doctype = $dom->createDocumentType('html');
        $aframe_dom = $dom->createDocument(null, 'html', $doctype);
        $aframe_dom_head = $aframe_dom->createElement('head');
        $aframe_dom_body = $aframe_dom->createElement('body', "\n");
        $aframe_dom_scene = $aframe_dom->createElement("a-scene", "\n");
        
        /* Add metatags */
        $this->meta()->DOMAppendTags($aframe_dom, $aframe_dom_head);
        
        /* Add primitives to DOM */
        $this->DOMAppendPrimitives($aframe_dom, $aframe_dom_scene);
        
        $cdn_script = $aframe_dom->createElement('script');
        $cdn_script->setAttribute('src', 'https://aframe.io/releases/0.2.0/aframe.min.js');
        $aframe_dom_head->appendChild($cdn_script);
        
        /* Pull DOM together */
        $aframe_dom_body->appendChild($aframe_dom_scene);
        $html = $aframe_dom->getElementsByTagName('html')[0];
        $html->appendChild($aframe_dom_head);
        $html->appendChild($aframe_dom_body);
        
        $aframe_dom->formatOutput = true;
        
        /* Print Scene */
        print $aframe_dom->saveHTML();
    }
}
 