<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 25, 2016 - 7:55:29 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         ComponentAbstract.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Core\Helpers;

use \AframeVR\Interfaces\ComponentInterface;
use \AframeVR\Core\Exceptions\{
    InvalidComponentMethodException,
    InvalidComponentArgumentException
};
use \DOMAttr;

abstract class ComponentAbstract implements ComponentInterface
{

    /**
     * Array of dom attributes
     *
     * @var array
     */
    protected $dom_attributes = array();

    /**
     * Array of component scripts
     *
     * @var array
     */
    protected $component_scripts = array();

    /**
     * Name of DOM attribute
     *
     * @var string
     */
    protected $dom_attribute_name;

    /**
     * Loaded Component Method object
     *
     * @var object
     */
    protected $methodProvider;

    /**
     * Component Constructor
     */
    public function __construct()
    {
        $this->initializeComponent();
        $this->setMethodProvider();
    }

    
    /**
     * Call passes all calls to no existing methods to self::methodProvider
     *
     * @param string $method            
     * @param array $args            
     * @throws InvalidComponentMethodException
     */
    public function __call(string $method, $args)
    {
        if (is_object($this->methodProvider) && method_exists($this->methodProvider, $method)) {
            array_unshift($args, 0);
            $args[0] = &$this->dom_attributes;
            
            return call_user_func_array(array(
                $this->methodProvider,
                (string) $method
            ), $args);
        } else {
            $class = is_object($this->methodProvider) ? get_class($this->methodProvider) : get_called_class();
            throw new InvalidComponentMethodException($method, $class);
        }
    }
    
    /**
     * Return DOM attribute contents
     *
     * @return string
     */
    public function getDomAttributeString(): string
    {
        $attrs       = $this->getDOMAttributesArray();
        $attr_format = implode(': %s; ', array_keys($attrs)) . ': %s;';
    
        return vsprintf($attr_format, array_values($attrs));
    }
    
    /**
     * Set class providing component methods
     *
     * @param string $method_provider            
     * @return void
     */
    public function setMethodProvider(string $mp = 'DefaultMethods')
    {
        $mp_class = substr(get_called_class(), 0, strrpos(get_called_class(), '\\')) . '\Methods\\' . $mp;
        
        $this->methodProvider = new $mp_class();
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
        return ! empty($this->dom_attributes);
    }

    /**
     * Get component DOM Atributes array
     *
     * {@inheritdoc}
     *
     * @return array
     */
    public function getDOMAttributesArray(): array
    {
        return $this->dom_attributes;
    }

    /**
     * Get Component scripts
     *
     * {@inheritdoc}
     *
     * @return array
     */
    public function getComponentScripts(): array
    {
        return (array) $this->component_scripts;
    }

    /**
     * Add component scripts
     *
     * {@inheritdoc}
     *
     */
    public function addComponentScripts(string $vendor_component, string $script_name)
    {
        $this->component_scripts[$vendor_component] = $script_name;
    }

    /**
     * Get DOMAttr for the entity
     *
     * @return DOMAttr
     */
    public function getDOMAttr(): DOMAttr
    {
        return new DOMAttr($this->getDomAttributeName(), $this->getDomAttributeString());
    }

    /**
     * Get Dom attribute name
     *
     * @return string
     */
    public function getDomAttributeName(): string
    {
        return $this->dom_attribute_name;
    }

    /**
     * Set Dom Attribute name
     *
     * @param string $dom_attribute_name
     * @return void
     */
    public function setDomAttributeName(string $dom_attribute_name)
    {
        $this->dom_attribute_name = $dom_attribute_name;
    }
}
