<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 7, 2016 - 2:32:47 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         StatsComponent.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Components\ascene\Stats;

use \AframeVR\Interfaces\Core\Components\ascene\StatsCMPTIF;
use \AframeVR\Core\Helpers\ComponentAbstract;

class StatsComponent extends ComponentAbstract implements StatsCMPTIF
{

    protected $dom_attribute;
    
    /**
     * Initialize Component
     *
     * {@inheritdoc}
     *
     * @return bool
     */
    public function initializeComponent(): bool
    {
        $this->setDomAttribute('stats');
        $this->set();
        return true;
    }

    /**
     * Entity visible
     *
     * {@inheritdoc}
     *
     * @param bool $visible
     * @return StatsCMPTIF
     */
    public function set(bool $visible = true): StatsCMPTIF
    {
        $this->dom_attribute = $visible ? 'true' : 'false';
        return $this;
    }
    
    /**
     * Does component have DOM Atributes
     * 
     * If compnent is called then we return true
     * 
     * {@inheritdoc}
     *
     * @return bool
     */
    public function hasDOMAttributes(): bool
    {
        return true;
    }
    
    /**
     * Return DOM attribute contents
     *
     * Scale Components dom atribute contains roll, pitch, yaw
     * Ex: rotation="1 1 1"
     *
     * @return string
     */
    public function getDomAttributeString(): string
    {
        return $this->dom_attribute;
    }
}