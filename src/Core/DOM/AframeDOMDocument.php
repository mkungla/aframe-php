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
 * @issues      https://github.com/mkungla/aframe-php/issues
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
    use AframeDOMProcessor;

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
     * Extra scrits to add into head
     *
     * Like components and shaders
     *
     * @var array $scripts
     */
    protected $scripts = array();

    /**
     * A-Frame DOM
     *
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        /* Config */
        $this->configOptions($config);

        /* Create HTML5 Document type */
        $this->createDocType('html');

        /* Create A-Frame DOM Document */
        $this->createAframeDocument();

        /* Create boostrap elements */
        $this->documentBootstrap();
    }

    /**
     * Render scene this DOM Object is attached to
     *
     * @return string
     */
    public function render(): string
    {
        $html = $this->docObj->getElementsByTagName('html')->item(0);
        /* Make sure we do not add duplicates when render is called multiple times */
        if (! $html->hasChildNodes()) {
            $this->renderHead();

            $html->appendChild($this->head);

            $this->renderBody();

            $html->appendChild($this->body);
        }
        return $this->format_output ? $this->correctOutputFormat($this->docObj->saveHTML()) : $this->docObj->saveHTML();
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
            if ($this->format_output) {
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
     * Register scripts to be added to DOM
     *
     * @param array $scripts
     * @return void
     */
    public function registerScripts(array $scripts)
    {
        $this->scripts = array_merge($this->scripts, $scripts);
    }
    /**
     * Append scripts
     *
     * @param array $scripts
     * @return void
     */
    public function appendScripts(array $scripts)
    {
        foreach($scripts as $url => $use) {
            (!$use)?:$this->appendScript($url);
        }
    }

    /**
     * Append script
     *
     * @param string $script_uri
     * @return void
     */
    public function appendScript(string $script_uri)
    {
        $extra_script_url = sprintf('%s%s',$this->assets_uri, $script_uri);
        $extra_script     = $this->docObj->createElement('script');
        $extra_script->setAttribute('src', $extra_script_url);
        $this->head->appendChild($extra_script);
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
        $html               = new DOMDocument();
        $html->formatOutput = $this->format_output;

        $html_scene = $html->importNode($this->scene, true);
        $html->appendChild($html_scene);
        return $this->format_output ? $this->correctOutputFormat($html->saveHTML()) : $html->saveHTML();
    }

    /**
     * Add scene components
     *
     * @param array $components
     * @return void
     */
    public function appendSceneComponents(array $components)
    {
        foreach ($components as $component) {
            /*
             * Check does component has any attributes to add to scene DOM element.
             * default attributes most of cases are ommited so we might not have any attributes to add
             */
            if ($component->hasDOMAttributes())
                $this->scene->setAttributeNode($component->getDOMAttr());
        }
    }

    /**
     * Append DOM attributes no set by components
     *
     * @param \DOMElement $a_entity
     */
    public function appendSceneAttributes(array $attrs)
    {
        foreach ($attrs as $attr => $val) {
            if(is_bool($val))
                $val = $val ? '' : 'false';
                $this->appendSceneAttribute($attr, $val);
        }
    }

    private function appendSceneAttribute($attr, $val)
    {
        if ($attr === 'id' || is_numeric($val))
            return;

            $this->scene->setAttribute($attr, $val);
    }


    /**
     * Set configuration option related to DOM
     *
     * @param Config $config
     * @return void
     */
    protected function configOptions(Config $config)
    {
        $this->setConfigurationOption($config, 'format_output', false);
        $this->setConfigurationOption($config, 'cdn_url', null);
        $this->setConfigurationOption($config, 'use_cdn', false);
        $this->setConfigurationOption($config, 'assets_uri', '/aframe');
    }

    /**
     * Set individual option
     *
     * @param Config $config
     * @param string $opt
     * @param mixed $default
     * @return void
     */
    protected function setConfigurationOption(Config $config, string $opt, $default)
    {
        $this->{$opt} = $config->get($opt) ?? $default;
    }
}
