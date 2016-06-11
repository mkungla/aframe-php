<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 11, 2016 - 1:16:40 AM
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
 * File         Render.php
 * Code format  PSR-2
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko.kungla@gmail.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace Aframe\helpers;

final class Render
{

    public static function temporary(\Aframe\VR $VR)
    {
        self::doctype();
        self::htmlhead($VR);
        self::scene($VR);
        self::htmlend($VR);
    }

    private static function doctype()
    {
        print '<!DOCTYPE html>' . PHP_EOL;
    }

    private static function htmlhead(&$VR)
    {
        print '<html> 
<head>
    <title>' . $VR->meta()->title() . '</title>
    <meta charset="utf-8">
    <script src="https://aframe.io/releases/0.2.0/aframe.min.js"></script>
    <script src="https://rawgit.com/ngokevin/aframe-text-component/master/dist/aframe-text-component.min.js"></script>
</head>
<body>' . PHP_EOL;
    }

    private static function scene(&$VR)
    {
        print '<a-scene>' . PHP_EOL;
        self::assets($VR);
        self::entities($VR);
        self::cylinders($VR);
        self::curvedimages($VR);
        self::planes($VR);
        self::images($VR);
        print '</a-scene>' . PHP_EOL;
    }

    private static function htmlend(&$VR)
    {
        print '</body>' . PHP_EOL . '</html>' . PHP_EOL;
        ;
    }

    private static function assets(&$VR)
    {
        print '<a-assets>' . PHP_EOL;
        
        foreach ($VR->scene()
            ->assets()
            ->getMixins() as $mixin) {
            self::mixin($mixin);
        }
        foreach ($VR->scene()
            ->assets()
            ->getImages() as $img) {
            self::img($img);
        }
        print '</a-assets>' . PHP_EOL;
    }

    private static function mixin($mixin)
    {
        printf('    <a-mixin id="%s"%s></a-mixin>%s', $mixin->getID(), $mixin->position() . $mixin->geometry() . $mixin->material() . $mixin->light() . $mixin->attribute() . $mixin->to() . $mixin->repeat() . $mixin->easing() . $mixin->dur(), PHP_EOL);
    }

    private static function img($img)
    {
        printf('    <img id="%s" src="%s">%s', $img->getID(), $img->getSRC(), PHP_EOL);
    }

    private static function entities(&$VR)
    {
        foreach ($VR->scene()->getEntities() as $entity) {
            self::entity($entity);
        }
    }

    private static function cylinders(&$VR)
    {
        foreach ($VR->scene()->getCylinders() as $cylinder) {
            self::cylinder($cylinder);
        }
    }

    private static function planes(&$VR)
    {
        foreach ($VR->scene()->getPlanes() as $plane) {
            self::plane($plane);
        }
    }

    private static function entity($entity)
    {
        printf('<a-entity%s>', $entity->position() . $entity->attr() . $entity->light() . $entity->geometry() . $entity->material() . $entity->scale() . $entity->text() . $entity->mixin() . $entity->rotation());
        
        $childs = $entity->getEntities();
        if (! empty($childs)) {
            foreach ($childs as $key => $child) {
                self::entity($child);
            }
        }
        printf('</a-entity>%s', PHP_EOL);
    }

    private static function cylinder($cylinder)
    {
        printf('<a-cylinder%s>', $cylinder->position() . $cylinder->attr() . $cylinder->light() . $cylinder->geometry() . $cylinder->material() . $cylinder->scale() . $cylinder->mixin() . $cylinder->src() . $cylinder->height() . $cylinder->radius());
        
        $childs = $cylinder->getEntities();
        if (! empty($childs)) {
            print PHP_EOL;
            foreach ($childs as $key => $child) {
                self::entity($child);
            }
        }
        
        $animations = $cylinder->getAnimations();
        if (! empty($animations)) {
            print PHP_EOL;
            foreach ($animations as $key => $animation) {
                self::animation($animation);
            }
        }
        
        printf('</a-cylinder>%s', PHP_EOL);
    }

    private static function animation($animation)
    {
        printf('<a-animation %s>', $animation->mixin());
        
        printf('</a-animation>%s', PHP_EOL);
    }

    private static function curvedimages(&$VR)
    {
        foreach ($VR->scene()->getCurvedimages() as $curvedimage) {
            self::curvedimage($curvedimage);
        }
    }

    private static function curvedimage($curvedimage)
    {
        printf('<a-curvedimage%s>', $curvedimage->position() . $curvedimage->attr() . $curvedimage->light() . $curvedimage->geometry() . $curvedimage->material() . $curvedimage->scale() . $curvedimage->mixin() . $curvedimage->src() . $curvedimage->height() . $curvedimage->radius() . $curvedimage->theta_length() . $curvedimage->rotation());
        
        printf('</a-curvedimage>%s', PHP_EOL);
    }

    private static function images(&$VR)
    {
        foreach ($VR->scene()->getImages() as $image) {
            self::image($image);
        }
    }

    private static function image($curvedimage)
    {
        printf('<a-image%s>', $curvedimage->position() . $curvedimage->attr() . $curvedimage->light() . $curvedimage->geometry() . $curvedimage->material() . $curvedimage->scale() . $curvedimage->mixin() . $curvedimage->src() . $curvedimage->height() . $curvedimage->width() . $curvedimage->radius() . $curvedimage->theta_length() . $curvedimage->rotation());
        
        printf('</a-image>%s', PHP_EOL);
    }

    private static function plane($plane)
    {
        printf('<a-plane%s>', $plane->position() . $plane->attr() . $plane->light() . $plane->geometry() . $plane->material() . $plane->scale() . $plane->mixin() . $plane->src() . $plane->height() . $plane->width() . $plane->radius() . $plane->rotation());
        
        $childs = $plane->getEntities();
        if (! empty($childs)) {
            print PHP_EOL;
            foreach ($childs as $key => $child) {
                self::entity($child);
            }
        }
        
        $animations = $plane->getAnimations();
        if (! empty($animations)) {
            print PHP_EOL;
            foreach ($animations as $key => $animation) {
                self::animation($animation);
            }
        }
        
        printf('</a-plane>%s', PHP_EOL);
    }
}
 