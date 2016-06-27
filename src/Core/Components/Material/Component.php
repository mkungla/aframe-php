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
 * File         PositionComponent.php
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

use \AframeVR\Core\Helpers\ComponentAbstract;
use \AframeVR\Interfaces\ComponentInterface;
use \AframeVR\Interfaces\Core\Components\Material\MaterialInterface;
use \AframeVR\Core\Exceptions\BadShaderCallException;
use \AframeVR\Interfaces\ShaderInterface;

class Component extends ComponentAbstract implements ComponentInterface, MaterialInterface
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
        $attrs = $this->getDOMAttributesArray();
        return '';
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
}
