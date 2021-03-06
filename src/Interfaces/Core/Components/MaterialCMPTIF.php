<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 27, 2016 - 4:53:15 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         MaterialCMPTIF.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Interfaces\Core\Components;

use \AframeVR\Interfaces\ComponentInterface;

/**
 * Material Component Interface
 *
 * The material component defines the appearance of an entity. The built-in shaders allow us to define properties such
 * as color, opacity, or textures. Custom shaders can be registered to extend the material component to allow for a
 * wide range of visual effects. The geometry component can be defined alongside to provide a shape alongside the
 * appearance to create a complete mesh.
 *
 * The material component is coupled to shaders. Some of the built-in shading models will provide properties like color
 * or texture to the material component.
 */
interface MaterialCMPTIF extends ComponentInterface
{

    /**
     * depthTest
     *
     * Whether depth testing is enabled when rendering the material.
     *
     * @param bool $depth_test            
     * @return MaterialCMPTIF
     */
    public function depthTest(bool $depth_test = true): MaterialCMPTIF;

    /**
     * opacity
     *
     * Extent of transparency. If the transparent property is not true, then the material will remain opaque and
     * opacity will only affect color.
     *
     * @param float $opacity            
     * @return MaterialCMPTIF
     */
    public function opacity(float $opacity = 1.0): MaterialCMPTIF;

    /**
     * transparent
     *
     * Whether material is transparent. Transparent entities are rendered after non-transparent entities.
     *
     * @param bool $transparent            
     * @return MaterialCMPTIF
     */
    public function transparent(bool $transparent = false): MaterialCMPTIF;

    /**
     * Material Shader
     *
     * Which shader or shading model to use.
     * Defaults to the built-in standard shading model.
     * Can be set to the built-in flat shading model or to a registered custom shader
     *
     * @param null|string $shader            
     * @throws BadShaderCallException
     * @return object|null
     */
    public function shader(string $shader = null);

    /**
     * side
     *
     * Which sides of the mesh to render. Can be one of front, back, or double.
     *
     * @param string $side            
     * @return MaterialCMPTIF
     */
    public function side(string $side = 'front'): MaterialCMPTIF;
    
    /**
     * Do not apply fog to certain entities, we can disable fog for certain materials.
     *
     * @param bool $fog
     * @return MaterialCMPTIF
     */
    public function fog(bool $fog = true): MaterialCMPTIF;
}