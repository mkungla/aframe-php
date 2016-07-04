<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 25, 2016 - 7:51:42 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         MaterialComponent.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Components\Material;

use \AframeVR\Interfaces\Core\Components\MaterialCMPTIF;
use \AframeVR\Core\Helpers\ComponentAbstract;
use \AframeVR\Core\Exceptions\BadShaderCallException;
use \AframeVR\Interfaces\ShaderInterface;

class MaterialComponent extends ComponentAbstract implements MaterialCMPTIF
{

    private $shaderObj;

    /**
     * Initialize Component
     *
     * {@inheritdoc}
     *
     * @return bool
     */
    public function initializeComponent(): bool
    {
        $this->setDomAttribute('material');
        return true;
    }

    /**
     * Return DOM attribute contents
     *
     * @return string
     */
    public function getDomAttributeString(): string
    {
        $this->prepareShader();
        return parent::getDomAttributeString();
    }

    /**
     * Material Shader
     *
     * {@inheritdoc}
     *
     * @param string $shader            
     * @throws BadShaderCallException
     * @return object|null
     */
    public function shader(string $shader = 'standard')
    {
        $this->dom_attributes['shader'] = $shader;
        
        if ($this->shaderObj instanceof ShaderInterface)
            return $this->shaderObj;
        
        $shader = sprintf('\AframeVR\Core\Shaders\%s', ucfirst($shader));
        if (class_exists($shader)) {
            $this->shaderObj = new $shader();
        } else {
            throw new BadShaderCallException($shader);
        }
        return $this->shaderObj ?? null;
    }

    /**
     * opacity
     *
     * {@inheritdoc}
     *
     * @param float $opacity            
     * @return void
     */
    public function opacity(float $opacity = 1.0)
    {
        $this->dom_attributes['opacity'] = $opacity;
    }
    
    /**
     * transparent
     *
     * {@inheritdoc}
     *
     * @param bool $transparent            
     * @return void
     */
    public function transparent(bool $transparent = false)
    {
        $this->dom_attributes['transparent'] = $transparent ? 'true' : 'false';
    }
    
    /**
     * depthTest
     *
     * {@inheritdoc}
     *
     * @param bool $depth_test
     * @return void
     */
    public function depthTest(bool $depth_test = true)
    {
        $this->dom_attributes['depthTest'] = $depth_test ? 'true' : 'false';
    }
    
    /**
     * side
     *
     * {@inheritdoc}
     *
     * @param string $side            
     * @return void
     */
    public function side(string $side = 'front')
    {
        $this->dom_attributes['side'] = $side;
    }
    
    /**
     * Prepare Shader attributes
     *
     * @return void
     */
    private function prepareShader()
    {
        if (! empty($this->shaderObj)) {
            $this->dom_attributes = array_merge($this->dom_attributes, $this->shaderObj->getAttributes());
        }
    }
}
