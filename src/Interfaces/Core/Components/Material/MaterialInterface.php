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
 * File         MaterialInterface.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Interfaces\Core\Components\Material;

interface MaterialInterface
{

    /**
     * Material Shader
     *
     * Which shader or shading model to use.
     * Defaults to the built-in standard shading model.
     * Can be set to the built-in flat shading model or to a registered custom shader
     *
     * @param string $shader            
     * @throws BadShaderCallException
     * @return object|null
     */
    public function shader(string $shader = 'standard');
}
