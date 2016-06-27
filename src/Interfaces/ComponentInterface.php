<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 21, 2016 - 12:11:46 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         ComponentInterface.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Interfaces;

use \DOMAttr;

interface ComponentInterface
{

    /**
     * Set class providing component methods
     *
     * @api
     * 
     * @param string $method_provider            
     * @return void
     */
    public function setMethodProvider(string $method_provider = 'DefaultMethods');

    /**
     * Initialize Component
     *
     * When component is loaded then this method is called. It MUST prepare component
     * and perform following.
     *
     * 1. Call $this->addDependencyScript(string $vendor, string, $script)
     * 1. Update $this->is_valid
     *
     * @api
     *
     * @return bool
     */
    public function initializeComponent(): bool;

    /**
     * Does component have DOM Atributes
     *
     * Is there any DOM attributes we should attach to DOMElement
     * of the entity when we are about to render parent entity.
     *
     * @api
     *
     * @return bool
     */
    public function hasDOMAttributes(): bool;

    /**
     * Get component DOM Atributes array
     *
     * @api
     *
     * @return bool
     */
    public function getDOMAttributesArray(): array;

    /**
     * Get Component scripts
     *
     * Return array of scripts which are required for this component.
     * Array Key: Vendor
     * Array Val: Script file basename
     *
     * @api
     *
     * @return array
     */
    public function getComponentScripts(): array;

    /**
     * Add component scripts
     *
     * "vendor/component-name","script"
     *
     * @api
     *
     * @param string $vendor_component            
     * @param string $script_name            
     */
    public function addComponentScripts(string $vendor_component, string $script_name);

    /**
     * Get DOMAttr for the entity
     *
     * @api
     *
     * @return DOMAttr
     */
    public function getDOMAttr(): DOMAttr;

    /**
     * Get DOM attribute name
     *
     * @api
     *
     * @return string
     */
    public function getDomAttributeName(): string;

    /**
     * Set DOM Attribute name
     *
     * @api
     *
     * @param string $dom_attribute_name            
     * @return void
     */
    public function setDomAttributeName(string $dom_attribute_name);

    /**
     * Return DOM attribute contents
     *
     * @api
     *
     * @return string
     */
    public function getDomAttributeString(): string;
}
