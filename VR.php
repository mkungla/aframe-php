<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 10, 2016 - 9:11:01 PM
 * Contact      marko.kungla@gmail.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * Package name    aframe-php
 * @category       mkungla
 * @package        aframe
 * @subpackage     php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         App.php
 * Code format  PSR-2
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko.kungla@gmail.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
 namespace Aframe;
 
 use \Aframe\helpers\{
     Meta,
     Render,
     Scene
 };
 
 class VR 
 {
     /**
      * meta tags
      * @var \Aframe\helpers\Meta $metaObj
      */
     private $metaObj;
     
     /**
      * scene class
      * @var \Aframe\helpers\Scene $sceneObj
      */
     private $sceneObj;
     
     public function render()
     {
         Render::temporary($this);
     }
     
     /**
      * meta
      * 
      * meta tags of scene
      * 
      * @return \Aframe\helpers\Meta
      */
     public function meta()
     {
         if (! $this->metaObj instanceof Meta)
             $this->metaObj = new Meta();
         return $this->metaObj;
     }
     
     /**
      * scene
      * 
      * scene object
      * 
      * @return \Aframe\helpers\Scene
      */
     public function scene()
     {
         if (! $this->sceneObj instanceof Scene)
             $this->sceneObj = new Scene();
         return $this->sceneObj;
     }
 }
 