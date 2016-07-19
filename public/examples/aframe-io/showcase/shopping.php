<?php
/* Common bootstrap for examples */
include dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'examples-bootstrap.php';

/* $aframe->scene(); === Anonymous scene */
$aframe->scene()->title('Shopping');
$aframe->scene()->description('Shopping — A-Frame');

$aframe->scene()->asset()->item('why-male-models')
    ->src('models/man/man.dae');

$aframe->scene()->asset()->img('fall')
    ->src('img/shopping/fall.png');
$aframe->scene()->asset()->img('goggles')
    ->src('img/shopping/goggles.png');
$aframe->scene()->asset()->img('price')
    ->src('img/shopping/price.png');
$aframe->scene()->asset()->img('shoes')
    ->src('img/shopping/shoes.png');
$aframe->scene()->asset()->img('shadow2')
    ->src('img/radial-shadow-2.png');
$aframe->scene()->asset()->img('mozvr')
    ->src('img/mozvr.png');

$aframe->scene()->camera()->active(true)
    ->position(0, 1.6, 0);

$aframe->scene()->entity('model')
    ->position(0, 0, -2)
    ->animation()
        ->attribute('rotation')
        ->from('0 -30 0')
        ->to('0 330 0')
        ->dur(15000)
        ->easing('linear')
        ->repeat('infinite');
$aframe->scene()->entity('model')->child()->colladamodel()
    ->position(-.35, 0, .55)
    ->rotation(0, -20, 0)
    ->scale(1.5, 1.5, 1.5)
    ->src('#why-male-models');
$aframe->scene()->entity('model')->child()->image()
    ->src('#shadow2')
    ->rotation(-90, 0, 0)
    ->scale(.5, .5, .5);

$aframe->scene()->curvedimage('mozvr-logo')
    ->src('#mozvr')
    ->radius(5.7)
    ->thetaLength(36)
    ->height(1)
    ->position(0, 2.6, 0)
    ->opacity(.5)
    ->animation()
        ->attribute('rotation')
        ->from('0 10 0')
        ->to('0 200 0')
        ->delay('500')
        ->dur(1000);

$aframe->scene()->image('price')
    ->src('#price')
    ->width(7)
    ->height(3.5)
    ->scale(.2, .2, .2)
    ->animation()
        ->attribute('position')
        ->from('0 2.8 -6')
        ->to('2.25 2.8 -6')
        ->delay(1000)
        ->dur(1000);

$aframe->scene()->cylinder('goggles')
    ->color('#101010')
    ->height(0.02)
    ->radius(0.8)
    ->animation(1)
        ->attribute('rotation')
        ->from('-270 0 0')
        ->to('-90 0 0')
        ->dur(750)
        ->delay(1000)
        ->fill('both');
$aframe->scene()->cylinder('goggles')
    ->animation(2)
        ->attribute('position')
        ->from('8 0 -9')
        ->to('8 3.5 -9')
        ->dur(750)
        ->delay(1000)
        ->fill('both');
$aframe->scene()->cylinder('goggles')->child()->image()
    ->src('#goggles')
    ->width(2)
    ->height(1)
    ->rotation(90, 0, 0)
    ->position(0, -.05, 0)
    ->scale(.4, .4, .4);

$aframe->scene()->curvedimage('stereoscopic-fall-collection-text')
    ->src('#fall')
    ->radius(5.7)
    ->thetaLength(18)
    ->height(.45)
    ->position(0, .9, 0)
    ->scale(.4, .4, .4)
    ->animation(1)
        ->attribute('rotation')
        ->from('0 180 0')
        ->to('0 210 0')
        ->dur(750)
        ->delay(1000);

$aframe->scene()->curvedimage('shoes')
    ->src('#shoes')
    ->radius(5.7)
    ->thetaLength(18)
    ->height(.8)
    ->position(0, .9, 0)
    ->scale(.4, .4, .4)
        ->animation(1)
        ->attribute('rotation')
        ->from('0 180 0')
        ->to('0 130 0')
        ->dur(750)
        ->delay(1000);

$aframe->scene()->cylinder()
    ->side('back')
    ->position(0, .5, 0)
    ->radius(4)
    ->height(1.6)
    ->openEnded(true)
    ->color('#fff');

$aframe->scene()->sky()->color('#ECECEC');

$aframe->scene()->light(1)
    ->type('directional')
    ->color('#fff')
    ->intensity(.2)
    ->position(-1, 2, 1);

$aframe->scene()->light(2)
    ->type('ambient')
    ->color('#fff');

/* Render scene */
$aframe->scene()->render();
