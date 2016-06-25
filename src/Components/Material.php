<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 21, 2016 - 1:43:40 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         Material.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Components;

use \AframeVR\Interfaces\ShaderInterface;
use \AframeVR\Interfaces\ComponentInterface;
use \AframeVR\Core\Exceptions\BadShaderCallException;
use \DOMAttr;

class Material implements ComponentInterface
{

    private $shaderObj;

    /**
     * Whether depth testing is enabled when rendering the material.
     *
     * @var string true
     */
    protected $depthTest = 'true';

    /**
     * Extent of transparency.
     * If the transparent property is not true,
     * then the material will remain opaque and opacity will only affect color.
     *
     * @var float 1.0
     */
    protected $opacity = 1.0;

    /**
     * Whether material is transparent.
     * Transparent entities are rendered after non-transparent entities.
     *
     * @var string false
     */
    protected $transparent = 'false';

    /**
     * Which sides of the mesh to render.
     * Can be one of front, back, or double.
     *
     * @var string front
     */
    protected $side = 'front';

    /**
     * To set a texture using one of the built-in shading models, specify the src property.
     *
     * src can be a selector to either an <img> or <video> element:
     */
    protected $src = false;

    /**
     * Get Component scripts
     *
     * {@inheritdoc}
     *
     * @return array
     */
    public function getScripts(): array
    {
        return array();
    }

    /**
     * Does component have DOM Atributes
     *
     * {@inheritdoc}
     *
     * @return bool
     */
    public function hasDOMAttributes(): bool
    {
        $this_attributes = get_object_vars($this);
        $shader_attributes = is_object($this->shaderObj) ? get_object_vars($this->shaderObj) : [];
        $attributes = array_merge($this_attributes, $shader_attributes);
        unset($attributes['shaderObj']);
        return ! empty($attributes);
    }

    /**
     * Remove default DOMElement Attributes which are not required
     *
     * @return void
     */
    public function removeDefaultDOMAttributes()
    {
        $defaults = array(
            'depthTest' => 'true',
            'opacity' => 1.0,
            'transparent' => 'false',
            'side' => 'front'
        );
        
        $ignore = array(
            'shaderObj'
        );
        
        foreach (get_object_vars($this) as $name => $value) {
            if ((empty($value) || (array_key_exists($name, $defaults) && $value === $defaults[$name])) && ! in_array($name, $ignore))
                unset($this->$name);
        }
        
        /* Remove defaults from current shader */
        if ($this->shaderObj instanceof ShaderInterface) {
            $this->shaderObj->removeDefaultDOMAttributes();
        }
    }

    /**
     * Get DOMAttr for the entity
     *
     * @return DOMAttr
     */
    public function getDOMAttributes(): DOMAttr
    {
        $attributes = [];
        $material = [];
        $material['depthTest'] = $this->depthTest ?? null;
        $material['opacity'] = $this->opacity ?? null;
        $material['transparent'] = $this->transparent ?? null;
        $material['side'] = $this->side ?? null;
        
        foreach ($material as $key => $val) {
            if (empty($val) || ! property_exists($this, $key))
                unset($material[$key]);
        }
        if (! empty($material)) {
            $material_format = implode(': %s; ', array_keys($material)) . ': %s;';
            $attributes[] = vsprintf($material_format, array_values($material));
        }
        
        /* Load shader if not loaded yet */
        if (is_object($this->shaderObj)) {
            $shader_format = implode(': %s; ', array_keys(get_object_vars($this->shaderObj))) . ': %s;';
            $attributes[] = vsprintf($shader_format, array_values(get_object_vars($this->shaderObj)));
        }
        
        $format = count($attributes) === 1 ? '%s' : '%s %s';
        return new \DOMAttr('material', vsprintf($format, $attributes));
    }

    /**
     * Which shader or shading model to use.
     * Defaults to the built-in standard shading model.
     * Can be set to the built-in flat shading model or to a registered custom shader
     *
     * @var string standard
     * @return \AframeVR\Interfaces\ShaderInterface|null
     */
    public function shader(string $shader = 'standard')
    {
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
     * Extent of transparency. If the transparent property is not true,
     * then the material will remain opaque and opacity will only affect color.
     *
     * @param float $opacity            
     */
    public function opacity(float $opacity = 1.0)
    {
        $this->opacity = $opacity;
    }

    /**
     * transparent
     *
     * Whether material is transparent. Transparent entities are rendered after non-transparent entities.
     *
     * @param bool|string $transparent            
     */
    public function transparent(bool $transparent = false)
    {
        $this->transparent = $transparent ? 'true' : 'false';
    }

    /**
     * side
     *
     * Which sides of the mesh to render. Can be one of front, back, or double
     *
     * @param string $side            
     * @return void
     */
    public function side(string $side = 'front')
    {
        $this->side = $side;
    }
}
 