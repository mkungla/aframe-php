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

    /**
     * Set meta title
     *
     * @param string $title            
     */
    public function title(string $title = 'untitled')
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
     * Return meta tags as object
     *
     * @return \stdClass
     */
    public function getMetaTags()
    {
        $meta_tags = new \stdClass();
        $meta_tags->title = $this->title;
        $meta_tags->description = $this->description;
        $meta_tags->charset = $this->charset;
        
        return $meta_tags;
    }

    /**
     * Add DOM meta tags
     *
     * @param \DOMDocument $aframe_dom            
     * @param \DOMElement $head            
     */
    public function DOMAppendTags(\DOMDocument &$aframe_dom, \DOMElement &$head)
    {
        /* meta charset */
        $charset = $aframe_dom->createElement('meta');
        $charset->setAttribute('charset', 'utf-8');
        $head->appendChild($charset);
        
        /* meta title */
        $title = $aframe_dom->createElement('title', $this->title);
        $head->appendChild($title);
        
        /* meta description */
        $description = $aframe_dom->createElement('meta');
        $description->setAttribute('name', 'description');
        $description->setAttribute('content', $this->description);
        $head->appendChild($description);
        
        /* meta viewport */
        $viewport = $aframe_dom->createElement('meta');
        $viewport->setAttribute('name', 'viewport');
        $viewport->setAttribute('content', 'width=device-width,initial-scale=1,maximum-scale=1,shrink-to-fit=no,user-scalable=no,minimal-ui');
        $head->appendChild($viewport);
        
        /* mobile */
        $mobile = $aframe_dom->createElement('meta');
        $mobile->setAttribute('name', 'mobile-web-app-capable');
        $mobile->setAttribute('content', 'yes');
        $head->appendChild($mobile);
        
        /* theme */
        $theme = $aframe_dom->createElement('meta');
        $theme->setAttribute('name', 'theme-color');
        $theme->setAttribute('content', 'black');
        $head->appendChild($theme);
    }
}
