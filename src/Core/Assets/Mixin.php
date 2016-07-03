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
 ^ @issues      https://github.com/mkungla/aframe-php/issues
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
use \AframeVR\Core\Helpers\MockComponent;
use \Closure;

final class Mixin extends AssetsAbstract implements MixinInterface
{

    /**
     * Array of mocked components
     *
     * @var array
     */
    protected $mock_components = array();

    /**
     * Load component for this Mixin
     *
     * @param string $component_name            
     * @throws \AframeVR\Core\Exceptions\BadComponentCallException
     * @return object|null
     */
    public function component(string $component_name)
    {
        $component_name = strtolower($component_name);
        
        /* Does this mixin already have this component loaded */
        if (! array_key_exists($component_name, $this->mock_components)) {
            $component = sprintf(
                '\AframeVR\Core\Components\%s\%sComponent', 
                ucfirst($component_name), 
                ucfirst($component_name)
            );
            /* Does called component exist */
            if (class_exists($component)) {
                /* Create Closure to mock compnent to be applied to entity using this mixin */
                $this->mock_components[$component_name] = new MockComponent;
            } else {
                throw new BadComponentCallException($component_name);
            }
        }
        
        return $this->mock_components[$component_name] ?? null;
    }

    /**
     * Handle mixin components
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
        if (! method_exists($this, $component_name)) {
            $this->{$component_name} = Closure::bind(function () use ($component_name) {
                return $this->component($component_name);
            }, $this, get_class());
        }
        
        return call_user_func($this->{$component_name}, $args);
    }
}
