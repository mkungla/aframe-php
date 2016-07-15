<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 21, 2016 - 2:56:57 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         MeshAttributes.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Helpers;

use \AframeVR\Interfaces\EntityInterface;

/**
 * Many of the primitives are entities that compose a geometric mesh, meaning they
 * primarily prescribe the geometry and material components.
 * Most of the mesh
 * primitives share common attributes, especially for mapping to the material component.
 * These common attributes won’t be described in individual
 * documentation pages for each primitive so they will be listed here
 */
trait MeshAttributes
{

    /**
     * Load component for this entity or set it's attr
     *
     * @param string $component_name
     * @param null|string $attr_data
     * @throws \AframeVR\Core\Exceptions\BadComponentCallException
     * @return object|null
     */
    abstract public function attr(string $component_name, string $attr_data = null);

    /**
     * material.color
     *
     * @param string $color            
     * @return EntityInterface
     */
    public function color(string $color): EntityInterface
    {
        $this->attr('Material')
            ->shader()
            ->color($color);
        return $this;
    }

    /**
     * material.metalness
     *
     * @param int|float $metalness            
     * @return EntityInterface
     */
    public function metalness(float $metalness): EntityInterface
    {
        $this->attr('Material')
            ->shader()
            ->metalness($metalness);
        return $this;
    }

    /**
     * material.opacity
     *
     * @param float $opacity
     * @return EntityInterface
     */
    public function opacity(float $opacity): EntityInterface
    {
        $this->attr('Material')->opacity($opacity);
        return $this;
    }
    
    /**
     * material.repeat
     * 
     * @param float $x
     * @param float $y
     * 
     * @return EntityInterface
     */
    public function repeat(float $x, float $y): EntityInterface
    {
        $this->attr('Material')->repeat($x, $y);
        return $this;
    }
    
    /**
     * material.roughness
     *
     * @param float $roughness            
     * @return EntityInterface
     */
    public function roughness(float $roughness): EntityInterface
    {
        $this->attr('Material')
            ->shader()
            ->roughness($roughness);
        return $this;
    }

    /**
     * material.shader
     *
     * @param string $shader
     * @return EntityInterface
     */
    public function shader($shader): EntityInterface
    {
        $this->attr('Material')->shader($shader);
        return $this;
    }
    
    
    /**
     * material.src
     *
     * @param null|string $src            
     * @return EntityInterface
     */
    public function src(string $src = null): EntityInterface
    {
        $this->attr('Material')
            ->shader()
            ->src($src);
        return $this;
    }

    /**
     * material.transparent
     *
     * @param bool $transparent            
     * @return EntityInterface
     */
    public function transparent(bool $transparent = false): EntityInterface
    {
        $this->attr('Material')->transparent($transparent);
        return $this;
    }
}
