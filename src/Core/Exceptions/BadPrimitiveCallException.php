<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 9, 2016 - 10:46:39 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         BadPrimitiveCallException.php
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

final class BadPrimitiveCallException extends \BadMethodCallException
{

    public function __construct(string $message = 'null')
    {
        $this->message = sprintf("Requested primitive (%s) do not exist or can not be used as child of entity!\n", 
            $message);
    }
}
