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

final class AframeDOMDocument extends DOMImplementation
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
     * @var \DOMElement $head
     */
    protected $head;

    /**
     * <body>
     *
     * @var \DOMElement $body
     */
    protected $body;

    /**
     * <a-scene>
     *
     * @var \DOMElement $scene
     */
    protected $scene;

    /**
     * Nicely formats output with indentation and extra space.
     *
     * @var bool
     */
    public $formatOutput = true;

    /**
     * A-Frame DOM
     *
     * @param Config $config            
     */
    public function __construct(Config $config)
    {
        /* Create HTML5 Document type */
        $this->createDocType('html');
        /* Create A-Frame DOM Document */
        $this->createAframeDocument();
        /* Create <head> element */
        $this->createHead();
        /* Create <body> element */
        $this->createBody();
        /* Create <a-scene> element */
        $this->createScene();
        /* Set CDN of aframe.js */
        $this->setCDN($config->get('CDN'));
    }

    /**
     * Load aframe.in.js from CDN
     *
     * @return void
     */
    public function useCDN()
    {
        $this->use_cdn = true;
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
        $html = $this->docObj->getElementsByTagName('html')[0];
        
        $this->renderHead();
        $html->appendChild($this->head);
        
        $this->renderBody();
        $html->appendChild($this->body);
        return $this->docObj->saveHTML();
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
     * Add entity
     *
     * @param Entity $entity            
     * @return void
     */
    public function appendEntity(Entity $entity)
    {
        $this->scene->appendChild($entity->DOMElement($this->docObj));
    }

    /**
     * Get HTML of Scene only
     *
     * @return string
     */
    public function renderSceneOnly()
    {
        $html = new DOMDocument();
        $html_scene = $html->importNode($this->scene, true);
        $html->appendChild($html_scene);
        return $html->saveHTML();
    }

    /**
     * Prepeare head
     *
     * @return void
     */
    protected function renderHead()
    {
        $this->appendTitle();
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
        return array(
            array(
                'name' => 'description',
                'content' => $this->scene_description
            ),
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
     * Create title tag
     *
     * @return void
     */
    protected function appendTitle()
    {
        $title = $this->docObj->createElement('title', $this->scene_title);
        $this->head->appendChild($title);
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
     * Create <head> element node
     *
     * @return void
     */
    protected function createHead()
    {
        $this->head = $this->docObj->createElement('head');
    }

    /**
     * Create <body> element node
     *
     * @return void
     */
    protected function createBody()
    {
        $this->body = $this->docObj->createElement('body');
    }

    /**
     * Create <a-scene> element node
     *
     * @return void
     */
    protected function createScene()
    {
        $this->scene = $this->docObj->createElement('a-scene');
    }
}
