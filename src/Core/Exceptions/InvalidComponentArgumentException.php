<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 21, 2016 - 1:19:39 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         InvalidComponentArgumentException.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Exceptions;

final class InvalidComponentArgumentException extends \InvalidArgumentException
{

    /**
     * InvalidComponentArgumentException
     *
     * @param string $message            
     * @param string $component_method            
     */
    public function __construct(string $message = 'null', string $component_method = 'unknown')
    {
        $this->message = sprintf("Invalid argument (%s) for %s!\n", $message, $component_method);
    }
}
