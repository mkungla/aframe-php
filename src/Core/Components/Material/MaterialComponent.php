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
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Components\Material;

use \AframeVR\Interfaces\Core\Components\Material\MaterialInterface;
use \AframeVR\Core\Helpers\ComponentAbstract;
use \AframeVR\Core\Exceptions\BadShaderCallException;
use \AframeVR\Interfaces\ShaderInterface;

/**
 * AframeVR\Core\Components\Material
 *
 * The material component defines the appearance of an entity.
 * The built-in shaders allow us to define properties such as color,
 * opacity, or textures. Custom shaders can be registered to extend
 * the material component to allow for a wide range of visual effects.
 * The geometry component can be defined alongside to provide a shape alongside
 * the appearance to create a complete mesh. The material component is coupled to shaders.
 * Some of the built-in shading models will provide properties like color or texture to the material component.
 */
class MaterialComponent extends ComponentAbstract implements MaterialInterface
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
        $this->setDomAttributeName('material');
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
        $material_attrs = $this->getDOMAttributesArray();
        $format = implode(': %s; ', array_keys($material_attrs)) . ': %s;';
        return vsprintf($format, array_values($material_attrs));
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
     * Prepare Shader attributes
     *
     * @return void
     */
    private function prepareShader()
    {
        if (! empty($this->shaderObj)) {
            $this->shaderObj->removeDefaultDOMAttributes();
            foreach ($this->shaderObj as $key => $val)
                $this->dom_attributes[$key] = $val;
        }
    }
}
