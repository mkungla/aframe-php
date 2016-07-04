<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jul 4, 2016 - 6:14:02 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         ColladaModelComponent.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 * @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Components\ColladaModel;

use \AframeVR\Interfaces\Core\Components\ColladaModel\ColladaModelInterface;
use \AframeVR\Core\Helpers\ComponentAbstract;

class ColladaModelComponent extends ComponentAbstract implements ColladaModelInterface
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
        $this->setDomAttribute('collada-model');
        return true;
    }

    /**
     * pointing to an asset that specifies the src or url()
     * 
     * {@inheritdoc}
     * 
     * @param null|string $src
     * @return void
     */
    public function src( string $src = null)
    {
        $this->dom_attributes['src'] = $src;
    }

    /**
     * Return DOM attribute contents
     * 
     * @return string
     */
    public function getDomAttributeString(): string
    {
        $attr = substr($this->dom_attributes['src'], 0, 1) === '#' 
            ? $this->dom_attributes['src'] 
            : sprintf('url(%s)', $this->dom_attributes['src']);
        return $attr;
    }
}
