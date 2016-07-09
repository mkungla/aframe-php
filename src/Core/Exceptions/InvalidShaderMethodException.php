<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 21, 2016 - 3:40:17 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         InvalidComponentMethodException.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Exceptions;

final class InvalidShaderMethodException extends \BadMethodCallException
{
    /**
     * InvalidComponentMethodException
     *
     * @param string $message
     * @param string $shader_method
     */
    public function __construct(string $message = 'null', string $shader_method = 'unknown')
    {
        $this->message = sprintf(
            "Called invalid method (%s) for %s!\nFile: %s on line: %s", 
            $message, 
            $shader_method, 
            $this->getFile(), 
            $this->getLine()
        );
    }
}
