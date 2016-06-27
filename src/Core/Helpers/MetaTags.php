<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 20, 2016 - 9:05:27 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         MetaTags.php
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

final class MetaTags
{

    /* Meta title */
    private $title;

    /* Meta desription */
    private $description;

    /* Meta charset */
    private $charset = 'utf-8';

    public function __construct()
    {
        $this->title();
        $this->description();
        $this->viewport('width=device-width,initial-scale=1,maximum-scale=1,shrink-to-fit=no,user-scalable=no,minimal-ui');
        $this->charset();
        $this->setTag('mobile-web-app-capable', 'yes');
        $this->setTag('theme-color', 'black');
    }

    /**
     * Set meta title
     *
     * @param string $title            
     */
    public function title(string $title = 'Untitled A-Frame')
    {
        $this->title = $title;
    }

    /**
     * Set meta description
     *
     * @param string $description            
     */
    public function description(string $description = 'no description')
    {
        $this->description = $description;
        $this->setTag('description', $description);
    }

    /**
     * Set unset viewport
     *
     * @param string $viewport            
     * @return void
     */
    public function viewport(string $viewport = null)
    {
        $this->viewport = $viewport;
        ! empty($viewport) ? $this->setTag('viewport', $viewport) : $this->removeTag('viewport', $viewport);
    }

    /**
     * Set meta charset
     *
     * @param string $charset            
     */
    public function charset($charset = 'utf-8')
    {
        $this->charset = $charset;
    }

    /**
     * Set meta tags
     *
     * @param string $name            
     * @param string $content            
     * @return void
     */
    public function setTag(string $name, string $content)
    {
        $this->tags[$name] = $content;
    }

    /**
     * Remove meta tags
     *
     * Returns true if meta tag existed and was removed
     *
     * @param string $name            
     * @return bool
     */
    public function removeTag(string $name)
    {
        return array_key_exists($name, $this->tags) ? function () {
            unset($this->tags[$name]);
            return true;
        } : false;
    }

    /**
     * Add DOM meta tags
     *
     * @param \DOMDocument $aframe_dom            
     * @param \DOMElement $head            
     * @return void
     */
    public function DOMAppendAllTags(\DOMDocument &$aframe_dom, \DOMElement &$head)
    {
        /* meta title */
        $this->DOMappendTitle($aframe_dom, $head);
        
        /* meta charset */
        $this->DOMappendCharset($aframe_dom, $head);
        
        /* meta tags */
        foreach ($this->tags as $name => $content)
            $this->DOMappendTag($name, $content, $aframe_dom, $head);
    }

    /**
     * Append Meta tag to DOM
     *
     * @param string $name            
     * @param string $content            
     * @param \DOMDocument $aframe_dom            
     * @param \DOMElement $head            
     * @return void
     */
    private function DOMappendTag(string $name, string $content, \DOMDocument &$aframe_dom, \DOMElement &$head)
    {
        $child = $aframe_dom->createElement('meta');
        $child->setAttribute('name', $name);
        $child->setAttribute('content', $content);
        $head->appendChild($child);
    }

    /**
     * Insert Meta title
     *
     * @param \DOMDocument $aframe_dom            
     * @param \DOMElement $head            
     * @return void
     */
    private function DOMappendTitle(\DOMDocument &$aframe_dom, \DOMElement &$head)
    {
        $title = $aframe_dom->createElement('title', $this->title);
        $head->appendChild($title);
    }

    /**
     * Insert Charset
     *
     * @param \DOMDocument $aframe_dom            
     * @param \DOMElement $head            
     * @return void
     */
    private function DOMappendCharset(\DOMDocument &$aframe_dom, \DOMElement &$head)
    {
        $charset = $aframe_dom->createElement('meta');
        $charset->setAttribute('charset', $this->charset);
        $head->appendChild($charset);
    }
}
