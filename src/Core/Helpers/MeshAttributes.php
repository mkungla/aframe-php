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
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Helpers;

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
     * material.color
     *
     * @param string $color            
     * @return \AframeVR\Core\Helpers\MeshAttributes
     */
    public function color(string $color = 'gray')
    {
        $this->component('Material')
            ->shader()
            ->color($color);
        return $this;
    }

    /**
     * material.metalness
     *
     * @param string $metalness            
     * @return \AframeVR\Core\Helpers\MeshAttributes
     */
    public function metalness($metalness = 0)
    {
        $this->component('Material')
            ->shader()
            ->metalness($metalness);
        return $this;
    }

    /**
     * material.roughness
     *
     * @param string $roughness            
     * @return \AframeVR\Core\Helpers\MeshAttributes
     */
    public function roughness($roughness = 0.5)
    {
        $this->component('Material')
            ->shader()
            ->roughness($roughness);
        return $this;
    }

    /**
     * material.src
     *
     * @param string $src            
     * @return \AframeVR\Core\Helpers\MeshAttributes
     */
    public function src(string $src = null)
    {
        $this->component('Material')
            ->shader()
            ->src($src);
        return $this;
    }

    /**
     * geometry.translate
     *
     * @param string $translate
     * @return \AframeVR\Core\Helpers\MeshAttributes            
     */
    public function translate($translate = '0 0 0')
    {
        $this->component('Geometry')
            ->shader()
            ->translate($translate);
        return $this;
    }

    /**
     * material.shader
     *
     * @param string $shader            
     * @return \AframeVR\Core\Helpers\MeshAttributes
     */
    public function shader($shader = 'standard')
    {
        $this->component('Material')->shader($shader);
        return $this;
    }

    /**
     * material.opacity
     *
     * @param string $opacity            
     * @return \AframeVR\Core\Helpers\MeshAttributes
     */
    public function opacity($opacity = 0)
    {
        $this->component('Material')->opacity($opacity);
        return $this;
    }

    /**
     * material.transparent
     *
     * @param string $transparent            
     * @return \AframeVR\Core\Helpers\MeshAttributes
     */
    public function transparent($transparent = true)
    {
        $this->component('Material')->transparent($transparent);
        return $this;
    }
}
