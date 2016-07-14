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
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core;

use \AframeVR\Extras\Primitives;
use \AframeVR\Core\Entity;
use \AframeVR\Core\DOM\AframeDOMDocument;
use \AframeVR\Core\Assets;
use \Closure;
use \AframeVR\Core\Exceptions\BadComponentCallException;
use \AframeVR\Core\Helpers\EntityChildrenFactory;

final class Scene
{
    /* All scenes can use primitives */
    use Primitives;
    
    /**
     * Name with what you can retrieve this scene while working with multiple scenes
     *
     * @var string $name
     */
    private $keyword;
    
    /**
     * Is scene prepared for rendering
     *
     * @var bool
     */
    private $prepared;
    
    /**
     * Assets
     *
     * @var \AframeVR\Core\Assets
     */
    protected $assets;
    
    /**
     * Aframe Document Object Model
     *
     * @var \AframeVR\Core\DOM\AframeDOMDocument
     */
    protected $aframeDomObj;
    
    /**
     * Scene components
     *
     * @var array $components
     */
    protected $components = array();

    /**
     * Children Factory
     *
     * @var \AframeVR\Core\Helpers\EntityChildrenFactory
     */
    protected $childrenFactory;
    
    /**
     * Scene constructor
     *
     * @param string $keyword            
     * @param Config $config            
     */
    public function __construct(string $keyword, Config $config)
    {
        $this->keyword         = $keyword;
        $this->aframeDomObj    = new AframeDOMDocument($config);
        $this->childrenFactory = new EntityChildrenFactory();
        /* Initialize assests manager */
        $this->asset();
    }

    /**
     * Aframe Document Object Model
     *
     * @api
     *
     * @return \AframeVR\Core\DOM\AframeDOMDocument
     */
    public function dom()
    {
        return $this->aframeDomObj;
    }
    
    /**
     * Assets
     *
     * @api
     *
     * @return \AframeVR\Core\Assets
     */
    public function asset(): Assets
    {
        return $this->assets ?? $this->assets = new Assets();
    }

    /**
     * Child entity / primitive
     *
     * @return \AframeVR\Core\Helpers\EntityChildrenFactory
     */
    public function child(): EntityChildrenFactory
    {
        return $this->childrenFactory;
    }
    
    /**
     * Render the A-Frame scene and return the HTML
     *
     * @api
     *
     * @param bool $only_scene            
     * @return string
     */
    public function save($only_scene = false, string $file = null): string
    {
        $this->prepare();
        $html = ! $only_scene ? $this->aframeDomObj->render() : $this->aframeDomObj->renderSceneOnly();
        if (! empty($file) && is_writable(dirname($file))) {
            file_put_contents($file, $html);
        }
        
        return $html;
    }

    /**
     * Render the A-Frame scene and passthru HTML
     *
     * @api
     *
     * @param bool $only_scene            
     * @return void
     */
    public function render($only_scene = false)
    {
        print $this->save($only_scene);
    }

    /**
     * Alias of AframeDOMDocument::setTitle(string)
     *
     * Set <title> tag
     * $this->dom()->setTitle(string);
     *
     * @api
     *
     * @param string $title            
     */
    public function title(string $title)
    {
        $this->dom()->setTitle($title);
    }

    /**
     * Alias of AframeDOMDocument::setDescription(string)
     *
     * Set <meta name="description"> tag
     * $this->dom()->setDescription(string);
     *
     * @api
     *
     * @param string $description            
     */
    public function description(string $description)
    {
        $this->dom()->setDescription($description);
    }

    /**
     * Get scenes keyword
     *
     * @return string
     */
    public function getKeyword()
    {
        return $this->keyword;
    }

    /**
     * Load component for this entity
     *
     * @param string $component_name            
     * @throws \AframeVR\Core\Exceptions\BadComponentCallException
     * @return object|null
     */
    public function component(string $component_name)
    {
        if (! array_key_exists($component_name, $this->components)) {
            $component = sprintf('\AframeVR\Core\Components\ascene\%s\%sComponent', ucfirst($component_name), 
                ucfirst($component_name));
            if (class_exists($component)) {
                $this->components[$component_name] = new $component();
            } else {
                throw new BadComponentCallException($component_name);
            }
        }
        
        return $this->components[$component_name] ?? null;
    }

    /**
     * Map calls to scene entities and components
     *
     * Since we might need to customize these to have
     * custom components loaded as $this->methosd aswell therefore
     * we have these placeholder magic methods here
     *
     * @param string $method            
     * @param array $args            
     * @throws BadShaderCallException
     * @return Entity|\AframeVR\Interfaces\ComponentInterface
     */
    public function __call(string $method, array $args)
    {
        $id        = $args[0] ?? 0;
        $primitive = sprintf('\AframeVR\Extras\Primitives\%s', ucfirst($method));
        
        if ($method === 'entity' || class_exists($primitive)) {
            return $this->child()->getEntity($method, $id);
        } else {
            return $this->component($method);
        }
    }

    /**
     * Add everyting to DOM
     *
     * @return void
     */
    protected function prepare()
    {
        if ($this->prepared)
            return;
            
            /* Append all assets */
        $assets = $this->assets->getAssets();
        (! $assets) ?: $this->aframeDomObj->appendAssets($assets);
        /* Append all primitives */
        $this->preparePrimitives();
        
        /* Append all entities */
        $this->aframeDomObj->appendEntities($this->childrenFactory->getChildren());
        $this->aframeDomObj->appendSceneComponents($this->components);
        $this->prepared = true;
    }
}
