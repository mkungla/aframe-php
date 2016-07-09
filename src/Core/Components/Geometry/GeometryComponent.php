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
 * File         GeometryComponent.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Components\Geometry;

use \AframeVR\Interfaces\Core\Components\GeometryCMPTIF;
use \AframeVR\Core\Helpers\ComponentAbstract;
use \AframeVR\Core\Exceptions\InvalidComponentArgumentException;

class GeometryComponent extends ComponentAbstract implements GeometryCMPTIF
{

    /**
     * Initialize Component
     *
     * {@inheritdoc}
     *
     * @return bool
     */
    public function initializeComponent(): bool
    {
        $this->setDomAttribute('geometry');
        return true;
    }

    /**
     * Set geometry primitive
     *
     * {@inheritdoc}
     *
     * @param string $primitive            
     * @throws InvalidComponentArgumentException
     * @return GeometryCMPTIF
     */
    public function primitive(string $primitive): GeometryCMPTIF
    {
        if (in_array($primitive, self::ALLOWED_PRIMITIVES)) {
            $this->dom_attributes = array();
            
            $method_provider = sprintf('%sMethods', ucfirst($primitive));
            
            $this->dom_attributes['primitive'] = $primitive;
            
            $this->setMethodProvider($method_provider);
        } else {
            throw new InvalidComponentArgumentException((string) $primitive, 'Geometry::primitive');
        }
        return $this;
    }

    /**
     * translate
     *
     * {@inheritdoc}
     *
     * @param int $x            
     * @param int $y            
     * @param int $z            
     * @return GeometryCMPTIF
     */
    public function translate(int $x = 0, int $y = 0, int $z = 0): GeometryCMPTIF
    {
        $this->dom_attributes['translate'] = sprintf('%d %d %d', $x, $y, $z);
        return $this;
    }

    /**
     * Set Buffer
     *
     * {@inheritdoc}
     *
     * @param bool $buffer            
     * @return GeometryCMPTIF
     */
    public function buffer(bool $buffer = true): GeometryCMPTIF
    {
        $this->dom_attributes['buffer'] = $buffer ? 'true' : 'false';
        return $this;
    }

    /**
     * skipCache
     *
     * {@inheritdoc}
     *
     * @param bool $skipCache            
     * @return GeometryCMPTIF
     */
    public function skipCache(bool $skipCache = false): GeometryCMPTIF
    {
        $this->dom_attributes['skipCache'] = $skipCache ? 'true' : 'false';
        return $this;
    }
}
