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

use \AframeVR\Interfaces\PrimitiveInterface;

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
     * Load component for this entity
     *
     * @param string $component_name            
     * @throws \AframeVR\Core\Exceptions\BadComponentCallException
     * @return object|null
     */
    abstract public function component(string $component_name);

    /**
     * material.color
     *
     * @param string $color            
     * @return \AframeVR\Interfaces\PrimitiveInterface
     */
    public function color(string $color = 'gray'): PrimitiveInterface
    {
        $this->component('Material')
            ->shader()
            ->color($color);
        return $this;
    }

    /**
     * material.metalness
     *
     * @param int|float $metalness            
     * @return \AframeVR\Interfaces\PrimitiveInterface
     */
    public function metalness(float $metalness = 0): PrimitiveInterface
    {
        $this->component('Material')
            ->shader()
            ->metalness($metalness);
        return $this;
    }

    /**
     * material.roughness
     *
     * @param float $roughness            
     * @return \AframeVR\Interfaces\PrimitiveInterface
     */
    public function roughness(float $roughness = 0.5): PrimitiveInterface
    {
        $this->component('Material')
            ->shader()
            ->roughness($roughness);
        return $this;
    }

    /**
     * material.src
     *
     * @param null|string $src            
     * @return \AframeVR\Interfaces\PrimitiveInterface
     */
    public function src(string $src = null): PrimitiveInterface
    {
        $this->component('Material')
            ->shader()
            ->src($src);
        return $this;
    }

    /**
     * geometry.translate
     *
     * @param int|float $x            
     * @param int|float $y            
     * @param int|float $z            
     * @return \AframeVR\Interfaces\PrimitiveInterface
     */
    public function translate(float $x = 0, float $y = 0, float $z = 0): PrimitiveInterface
    {
        $this->component('Geometry')->translate($x, $y, $z);
        return $this;
    }

    /**
     * material.shader
     *
     * @param string $shader            
     * @return \AframeVR\Interfaces\PrimitiveInterface
     */
    public function shader($shader = 'standard'): PrimitiveInterface
    {
        $this->component('Material')->shader($shader);
        return $this;
    }

    /**
     * material.opacity
     *
     * @param float $opacity            
     * @return \AframeVR\Interfaces\PrimitiveInterface
     */
    public function opacity(float $opacity = 1.0): PrimitiveInterface
    {
        $this->component('Material')->opacity($opacity);
        return $this;
    }

    /**
     * material.transparent
     *
     * @param string $transparent            
     * @return \AframeVR\Interfaces\PrimitiveInterface
     */
    public function transparent(string $transparent = 'false'): PrimitiveInterface
    {
        $this->component('Material')->transparent($transparent);
        return $this;
    }
}
