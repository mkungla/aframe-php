<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 20, 2016 - 9:12:11 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 *
 * @category       AframeVR
 * @package        aframe-php
 *
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         Mixin.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Assets;

use \AframeVR\Core\Exceptions\BadComponentCallException;
use \AframeVR\Interfaces\Core\Assets\MixinInterface;
use \AframeVR\Core\Helpers\AssetsAbstract;

final class Mixin extends AssetsAbstract implements MixinInterface
{

    /**
     * DOM tag name of asset item
     *
     * @var string
     */
    protected $element_tag = 'a-mixin';

    /**
     * Array of mocked components
     *
     * @var array
     */
    protected $components = array();

    /**
     * Load component for this entity
     *
     * @param string $component_name
     * @throws \AframeVR\Core\Exceptions\BadComponentCallException
     * @return object|null
     */
    public function attr(string $component_name, string $attr_data = null)
    {
        if(!is_null($attr_data)) {
            $this->attrs[$component_name] = $attr_data;
            return $this;
        }
        if (! array_key_exists($component_name, $this->components)) {
            $component = sprintf('\AframeVR\Core\Components\%s\%sComponent', ucfirst($component_name),
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
     * Handle entity components
     *
     * Since we might need to customize these to have
     * custom components loaded as $this->methosd aswell therefore
     * we have these placeholder magic methods here
     *
     * @param string $component_name
     * @param array $args
     */
    public function __call(string $component_name, array $args)
    {
        return $this->attr($component_name, $args[0] ?? null);
    }

    /**
     * material.color
     *
     * @param string $color
     * @return Mixin
     */
    public function color(string $color = 'gray')
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
     * @return Mixin
     */
    public function metalness(float $metalness = 0)
    {
        $this->attr('Material')
        ->shader()
        ->metalness($metalness);
        return $this;
    }

    /**
     * material.roughness
     *
     * @param float $roughness
     * @return Mixin
     */
    public function roughness(float $roughness = 0.5)
    {
        $this->attr('Material')
        ->shader()
        ->roughness($roughness);
        return $this;
    }

    /**
     * material.src
     *
     * @param null|string $src
     * @return Mixin
     */
    public function src(string $src = null)
    {
        $this->attr('Material')
        ->shader()
        ->src($src);
        return $this;
    }

    /**
     * material.shader
     *
     * @param string $shader
     * @return Mixin
     */
    public function shader($shader = 'standard')
    {
        $this->attr('Material')->shader($shader);
        return $this;
    }

    /**
     * material.opacity
     *
     * @param float $opacity
     * @return Mixin
     */
    public function opacity(float $opacity = 1.0)
    {
        $this->attr('Material')->opacity($opacity);
        return $this;
    }

    /**
     * material.transparent
     *
     * @param bool $transparent
     * @return Mixin
     */
    public function transparent(bool $transparent = false)
    {
        $this->attr('Material')->transparent($transparent);
        return $this;
    }
}
