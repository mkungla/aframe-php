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
use \AframeVR\Core\Exceptions\{
    BadShaderCallException,
    InvalidShaderMethodException
};
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
     * Call passes all calls to no existing methods to self::methodProvider
     *
     * @param string $method            
     * @param array $args            
     * @throws InvalidComponentMethodException
     */
    public function __call(string $method, $args)
    {
        /* Well then this call should be passed to shader, but lets make sure
         * that shader is loaded and let shader either to throw any throwable */
        $this->shader();
        if (method_exists($this->shaderObj, $method)) {
            call_user_func_array(
                array(
                    $this->shaderObj,
                    (string) $method
                ), $args);
            return $this;
        } else {
            $class = get_class($this->shaderObj);
            throw new InvalidShaderMethodException($method, $class);
        }
    }

    /**
     * Material Shader
     *
     * {@inheritdoc}
     *
     * @param null|string $shader            
     * @throws BadShaderCallException
     * @return ShaderInterface|MaterialComponent
     */
    public function shader(string $shader = null)
    {
        $this->dom_attributes['shader'] = $this->dom_attributes['shader'] ?? $shader ?? 'standard';
        
        if ($this->shaderObj instanceof ShaderInterface)
            return $this->shaderObj;
        
        $shader = sprintf('\AframeVR\Core\Shaders\%s', ucfirst($this->dom_attributes['shader']));
        if (class_exists($shader)) {
            $this->shaderObj = new $shader();
        } else {
            throw new BadShaderCallException($shader);
        }
        return $this;
    }

    /**
     * opacity
     *
     * {@inheritdoc}
     *
     * @param float $opacity            
     * @return MaterialCMPTIF
     */
    public function opacity(float $opacity = 1.0): MaterialCMPTIF
    {
        $this->dom_attributes['opacity'] = $opacity;
        return $this;
    }

    /**
     * transparent
     *
     * {@inheritdoc}
     *
     * @param bool $transparent            
     * @return MaterialCMPTIF
     */
    public function transparent(bool $transparent = false): MaterialCMPTIF
    {
        $this->dom_attributes['transparent'] = $transparent ? 'true' : 'false';
        return $this;
    }

    /**
     * depthTest
     *
     * {@inheritdoc}
     *
     * @param bool $depth_test            
     * @return MaterialCMPTIF
     */
    public function depthTest(bool $depth_test = true): MaterialCMPTIF
    {
        $this->dom_attributes['depthTest'] = $depth_test ? 'true' : 'false';
        return $this;
    }

    /**
     * side
     *
     * {@inheritdoc}
     *
     * @param string $side            
     * @return MaterialCMPTIF
     */
    public function side(string $side = 'front'): MaterialCMPTIF
    {
        $this->dom_attributes['side'] = $side;
        return $this;
    }

    /**
     * Do not apply fog to certain entities, we can disable fog for certain materials.
     *
     * @param bool $fog            
     * @return MaterialCMPTIF
     */
    public function fog(bool $fog = true): MaterialCMPTIF
    {
        $this->dom_attributes['fog'] = $fog ? 'true' : 'false';
        return $this;
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
