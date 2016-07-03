<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 29, 2016 - 8:06:17 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         AframeDOMProcessor.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\DOM;

trait AframeDOMProcessor
{
    /**
     * A-Frame DOM Document type
     *
     * @var \DOMDocumentType
     */
    protected $doctypeObj;
    
    /**
     * A-Frame DOM Document
     *
     * @var \DOMDocument
     */
    protected $docObj;
    
    /**
     * Scene meta tile
     *
     * @var string $scene_title
     */
    protected $scene_title = 'Untitled';
    
    /**
     * Scene meta description
     *
     * @var string $scene_description
     */
    protected $scene_description = '';
    
    /**
     * <head>
     *
     * @var \DOMElement
     */
    protected $head;

    /**
     * <body>
     *
     * @var \DOMElement
     */
    protected $body;

    /**
     * <a-scene>
     *
     * @var \DOMElement
     */
    protected $scene;

    /**
     * <a-assets>
     *
     * @var \DOMElement
     */
    protected $assets;
    
    /************
     * CONFIG
     ***********/
    
    /**
     * Nicely formats output with indentation and extra space.
     *
     * @var bool
     */
    protected $format_output = false;

    /**
     * CDN Of aframe.js
     *
     * @var string
     */
    protected $cdn_url;
    
    /**
     * Whether to use CDN
     *
     * @var bool $use_cdn
     */
    protected $use_cdn = false;
    
    /**
     * aframe assets URI relative to App's base URL / domain
     * 
     * @var string assets_uri
     */
    protected $assets_uri;
    
    /**
     * \DOMImplementation::createDocumentType
     * 
     * DOMImplementation::createDocumentType — Creates an empty DOMDocumentType object 
     * 
     * {@inheritdoc}
     * 
     * @param string $qualifiedName
     * @param null|string $publicId
     * @param null|string $systemId
     * @return \DOMDocumentType
     */
    abstract protected function createDocumentType($qualifiedName, $publicId, $systemId);
    
    /**
     * \DOMImplementation::createDocument
     * 
     * {@inheritdoc}
     * 
     * @param string $namespaceURI
     * @param string $qualifiedName
     * @param \DOMDocumentType $doctype
     * @return \DOMDocument
     */
    abstract protected function createDocument($namespaceURI, $qualifiedName, \DOMDocumentType $doctype);
    
    /**
     * Add document comment for formatting
     *
     * @param string $element            
     * @param string $comment            
     */
    protected function appendFormatComment(string $element, string $comment)
    {
        if ($this->format_output) {
            $com = $this->docObj->createComment($comment);
            $this->{$element}->appendChild($com);
        }
    }

    /**
     * Correct html format for tags which are not supported by DOMDocument
     *
     * @param string $html            
     * @return string
     */
    protected function correctOutputFormat($html)
    {
        $tags   = array(
            '<!--',
            '-->',
            '<a-assets>',
            '</a-assets>',
            '</a-scene>'
        );
        $values = array(
            '',
            "\t",
            "\n\t<a-assets>",
            "\n\t</a-assets>",
            "\n</a-scene>"
        );
        return str_ireplace($tags, $values, $html);
    }

    /**
     * Prepeare head
     *
     * @return void
     */
    protected function renderHead()
    {
        $title = $this->docObj->createElement('title', $this->scene_title);
        $this->head->appendChild($title);
        $this->appendDefaultMetaTags();
        $this->appendCDN();
    }

    /**
     * Append deffault metatags
     *
     * @return void
     */
    protected function appendDefaultMetaTags()
    {
        $this->appendMetaTag(array(
            'name' => 'description',
            'content' => $this->scene_description
        ));
        foreach ($this->getDefaultMetaTags() as $tag)
            $this->appendMetaTag($tag);
    }

    /**
     * Get default meta tags
     *
     * @return array
     */
    protected function getDefaultMetaTags(): array
    {
        $dmt               = array();
        $dmt[0]['charset'] = 'utf-8';     
        $dmt[1]['name']    = 'viewport';
        
        $vp = 'width=device-width,initial-scale=1,maximum-scale=1,shrink-to-fit=no,user-scalable=no,minimal-ui';
        
        $dmt[1]['content'] = $vp;
        $dmt[2]['name']    = 'mobile-web-app-capable';
        $dmt[2]['content'] = 'yes';
        $dmt[3]['name']    = 'theme-color';
        $dmt[3]['content'] = 'black';
        
        return $dmt;
    }

    /**
     * If requested by user use aframe CDN
     *
     * @return void
     */
    protected function appendCDN()
    {
        $cdn_url = !empty($this->use_cdn) ? $this->cdn_url : sprintf('%s/aframe.min.js',$this->assets_uri);
        $cdn_script = $this->docObj->createElement('script');
        $cdn_script->setAttribute('src', $cdn_url);
        $this->head->appendChild($cdn_script);
    }

    /**
     * Prepare body
     *
     * @return void
     */
    protected function renderBody()
    {
        $this->body->appendChild($this->scene);
    }

    /**
     * Create meta tags
     *
     * @param array $attr            
     */
    protected function appendMetaTag(array $attr)
    {
        $metatag = $this->docObj->createElement('meta');
        foreach ($attr as $key => $val)
            $metatag->setAttribute($key, $val);
        $this->head->appendChild($metatag);
    }

    /**
     * Creates an empty DOMDocumentType object
     *
     * @param string $doctype            
     * @return void
     */
    protected function createDocType(string $doctype)
    {
        $this->doctypeObj = $this->createDocumentType($doctype, null, null);
    }

    /**
     * Creates a DOMDocument object of the specified type with its document element
     *
     * @return void
     */
    protected function createAframeDocument()
    {
        $this->docObj = $this->createDocument(null, 'html', $this->doctypeObj);
    }

    /**
     * Create dom elements for DOMDocument
     *
     * @return void
     */
    protected function documentBootstrap()
    {
        /* Create <head> element */
        $this->head = $this->docObj->createElement('head');
        /* Create <body> element */
        $this->body = $this->docObj->createElement('body', $this->format_output ? "\n" : '');
        /* Create <a-scene> element */
        $this->scene = $this->docObj->createElement('a-scene');
        /* Create <a-assets> element */
        $this->assets = $this->docObj->createElement('a-assets');
    }
}
