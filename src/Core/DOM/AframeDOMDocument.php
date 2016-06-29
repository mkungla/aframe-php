<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 27, 2016 - 9:55:09 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         AframeDOMDocument.php
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

use \AframeVR\Core\Config;
use \DOMImplementation;
use \DOMDocumentType;
use \DOMDocument;
use \AframeVR\Core\Entity;
use \AframeVR\Interfaces\AssetsInterface;

final class AframeDOMDocument extends DOMImplementation
{

    const DEFAULT_METATAGS = array(
        array(
            'charset' => 'utf-8'
        ),
        array(
            'name' => 'viewport',
            'content' => 'width=device-width,initial-scale=1,maximum-scale=1,shrink-to-fit=no,user-scalable=no,minimal-ui'
        ),
        array(
            'name' => 'mobile-web-app-capable',
            'content' => 'yes'
        ),
        array(
            'name' => 'theme-color',
            'content' => 'black'
        )
    );

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
     * CDN Of aframe.js
     *
     * @var string
     */
    protected $aframe_cdn;

    /**
     * Whether to use CDN
     *
     * @var bool $use_cdn
     */
    protected $use_cdn = false;

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

    /**
     * Nicely formats output with indentation and extra space.
     *
     * @var bool
     */
    protected $formatOutput = false;

    /**
     * A-Frame DOM
     *
     * @param Config $config            
     */
    public function __construct(Config $config)
    {
        /* Config */
        $this->formatOutput = is_bool($config->get('formatOutput')) 
            ? $config->get('formatOutput') : false;
        $this->use_cdn      = is_bool($config->get('useCDN')) 
            ? $config->get('useCDN') : false;
        
        /* Create HTML5 Document type */
        $this->createDocType('html');
        
        /* Create A-Frame DOM Document */
        $this->createAframeDocument();
        
        /* Create boostrap elements */
        $this->documentBootstrap();
        
        /* Set CDN of aframe.js */
        $this->setCDN(is_string($config->get('CDN')) ? $config->get('CDN') : '');
    }

    /**
     * Set CDN for aframe.js or min.js
     *
     * @param string $cdn            
     * @return void
     */
    public function setCDN(string $cdn)
    {
        $this->aframe_cdn = $cdn;
    }

    /**
     * Render scene this DOM Object is attached to
     *
     * @return string
     */
    public function render(): string
    {
        $this->docObj->formatOutput = $this->formatOutput;
        
        $html = $this->docObj->getElementsByTagName('html')->item(0);
        /* Make sure we do not add duplicates when render is called multiple times */
        if (! $html->hasChildNodes()) {
            $this->renderHead();
            
            $html->appendChild($this->head);
            
            $this->renderBody();
            
            $html->appendChild($this->body);
        }
        return $this->formatOutput 
        ? $this->correctOutputFormat($this->docObj->saveHTML()) 
        : $this->docObj->saveHTML();
    }

    /**
     * Set Scene meta title
     *
     * @param string $title            
     */
    public function setTitle(string $title)
    {
        $this->scene_title = $title;
    }

    /**
     * Set Scene meta description
     *
     * @param string $description            
     */
    public function setDescription(string $description)
    {
        $this->scene_description = $description;
    }

    /**
     * Append entities
     *
     * @param array $entities            
     * @return void
     */
    public function appendEntities(array $entities)
    {
        if (! empty($entities)) {
            foreach ($entities as $entity) {
                $this->appendEntity($entity);
            }
        }
    }

    /**
     * Append assets
     *
     * @param array $assets            
     * @return void
     */
    public function appendAssets(array $assets)
    {
        if (! empty($assets)) {
            if ($this->formatOutput) {
                $com = $this->docObj->createComment('');
                $this->scene->appendChild($com);
            }
            foreach ($assets as $asset) {
                $this->appendAsset($asset);
            }
            $this->scene->appendChild($this->assets);
        }
    }

    /**
     * Append asset
     *
     * Create asset DOMElement
     *
     * @param AssetsInterface $asset            
     */
    public function appendAsset(AssetsInterface $asset)
    {
        $this->appendFormatComment('assets', "\n\t");
        $this->assets->appendChild($asset->domElement($this->docObj));
    }

    /**
     * Create entity DOMElement
     *
     * Created entity and append it to scene
     *
     * @param Entity $entity            
     * @return void
     */
    public function appendEntity(Entity $entity)
    {
        $this->appendFormatComment('scene', "\n");
        $this->scene->appendChild($entity->domElement($this->docObj));
    }

    /**
     * Get HTML of Scene only
     *
     * @return string
     */
    public function renderSceneOnly()
    {
        $html = new DOMDocument();
        $html->formatOutput = $this->formatOutput;
        $html_scene = $html->importNode($this->scene, true);
        $html->appendChild($html_scene);
        return $this->formatOutput ? $this->correctOutputFormat($html->saveHTML()) : $html->saveHTML();
    }

    /**
     * Add document comment for formatting
     *
     * @param string $element            
     * @param string $comment            
     */
    protected function appendFormatComment(string $element, string $comment)
    {
        if ($this->formatOutput) {
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
        $tags = array(
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
        return self::DEFAULT_METATAGS;
    }

    /**
     * If requested by user use aframe CDN
     *
     * @return void
     */
    protected function appendCDN()
    {
        if ($this->use_cdn) {
            $cdn_script = $this->docObj->createElement('script');
            $cdn_script->setAttribute('src', $this->aframe_cdn);
            $this->head->appendChild($cdn_script);
        }
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
        $this->doctypeObj = $this->createDocumentType($doctype);
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
        $this->body = $this->docObj->createElement('body', $this->formatOutput ? "\n" : '');
        /* Create <a-scene> element */
        $this->scene = $this->docObj->createElement('a-scene');
        /* Create <a-assets> element */
        $this->assets = $this->docObj->createElement('a-assets');
    }
}
