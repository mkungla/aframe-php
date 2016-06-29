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

use \AframeVR\Extras\Primitives;
use \AframeVR\Core\Entity;
use \AframeVR\Core\DOM\AframeDOMDocument;
use \AframeVR\Core\Assets;

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

    protected $assets;

    /**
     * Aframe Document Object Model
     *
     * @var \AframeVR\Core\DOM\AframeDOMDocument
     */
    protected $aframeDomObj;

    /**
     * A-Frame scene entities
     *
     * @var array $entities
     */
    protected $entities = array();

    /**
     * Scene constructor
     *
     * @param string $keyword            
     * @param Config $config            
     */
    public function __construct(string $keyword, Config $config)
    {
        $this->keyword = $keyword;
        $this->aframeDomObj = new AframeDOMDocument($config);
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
     * Entity
     *
     * @api
     *
     * @param string $name            
     * @return \AframeVR\Core\Entity
     */
    public function entity(string $name = 'untitled'): Entity
    {
        return $this->entities[$name] ?? $this->entities[$name] = new Entity();
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
     * @return void
     */
    public function getKeyword()
    {
        return $this->keyword;
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
        $this->aframeDomObj->appendEntities($this->entities);
        $this->prepared = true;
    }
}
