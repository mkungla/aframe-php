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
     * Get Component scripts
     *
     * Return array of scripts which are required for this component.
     * Array Key: Vendor
     * Array Val: Script file basename
     *
     * @return array
     */
    public function getScripts(): array;

    /**
     * Does component have DOM Atributes
     *
     * Is there any DOM attributes we should attach to DOMElement of the entity
     * While there most likely are, purpose of this method is to determine that after
     * we have removed default values attributes which are not required.
     *
     * @return bool
     */
    public function hasDOMAttributes(): bool;

    /**
     * Remove default DOMElement Attributes which are not required
     *
     * @return void
     */
    public function removeDefaultDOMAttributes();

    /**
     * Get DOMAttr for the entity
     *
     * @return DOMAttr
     */
    public function getDOMAttributes(): DOMAttr;
}
