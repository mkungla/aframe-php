<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 21, 2016 - 12:10:50 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         Rotation.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Components;

use \AframeVR\Interfaces\ComponentInterface;

/**
 * The rotation component defines the orientation of an entity.
 *
 * It takes the roll (x), pitch (y), and yaw (z) as three space-delimited numbers indicating degrees of rotation.
 *
 * All entities inherently have the rotation component.
 */
class Rotation implements ComponentInterface
{

    /**
     * Negative X axis extends left.
     * Positive X Axis extends right.
     *
     * @var int $x
     */
    protected $x;

    /**
     * Negative Y axis extends up.
     * Positive Y Axis extends down.
     *
     * @var int $y
     */
    protected $y;

    /**
     * Negative Z axis extends in.
     * Positive Z Axis extends out.
     *
     * @var int $z
     */
    protected $z;

    /**
     * Set initial coordinates
     *
     * @param string $coordinates            
     */
    public function __construct($x = 0, $y = 0, $z = 0)
    {
        $this->update($x, $y, $z);
    }

    /**
     * Get Component scripts
     *
     * {@inheritdoc}
     *
     * @return array
     */
    public function getScripts(): array
    {
        return array();
    }

    /**
     * Does component have DOM Atributes
     *
     * {@inheritdoc}
     *
     * @return bool
     */
    public function hasDOMAttributes(): bool
    {
        return ! empty(get_object_vars($this));
    }

    /**
     * Remove default DOMElement Attributes which are not required
     *
     * @return void
     */
    public function removeDefaultDOMAttributes()
    {
        if ($this->x === 0 && $this->y === 0 && $this->z === 0) {
            unset($this->x);
            unset($this->y);
            unset($this->z);
        }
    }

    /**
     * Get DOMAttr for the entity
     *
     * @return DOMAttr
     */
    public function getDOMAttributes(): \DOMAttr
    {
        return new \DOMAttr('rotation', sprintf('%s %s %s', $this->x, $this->y, $this->z));
    }

    /**
     * Update coordinates
     *
     * @param string $coordinates            
     */
    public function update($x = 0, $y = 0, $z = 0)
    {
        $this->x = $x ?? 0;
        $this->y = $y ?? 0;
        $this->z = $z ?? 0;
    }
}
