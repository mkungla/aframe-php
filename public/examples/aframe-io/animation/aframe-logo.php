<?php
/* Common bootstrap for examples */
include dirname(__DIR__,2).DIRECTORY_SEPARATOR.'examples-bootstrap.php';

/* $aframe->scene(); === Anonymous scene */
$aframe->scene()->title('A-Frame Logo');
$aframe->scene()->description('A-Frame Logo');

$aframe->scene()->attr('vr-mode-ui','enabled: false');

$aframe->scene()->asset()->item('tree')
    ->src('models/tree1/tree1.dae');

$aframe->scene()->entity(1)->animation()
    ->attribute('position')
    ->from('0 5 0')
    ->to('0 0 0')
    ->dur(4000)
    ->easing('ease-out');
$aframe->scene()->entity(1)->el()->camera('camera')
    ->position(0, 880, 1290)
    ->rotation(-34, 0, 0)
    ->near(1000)
    ->far(4000)
    ->fov(2.2)
    ->wasdcontrols(false)
    ->lookcontrols(false);

$aframe->scene()->entity('logo')->rotation(0, 45, 0);

/*  Right side */
$aframe->scene()->entity('logo')->el()->entity(1)
    ->rotation(-20, 0, 0)
    ->position(0, 0, 10.75)
    ->scale(1, 0, 1);
$aframe->scene()->entity('logo')->el()->entity(1)->animation()
    ->attribute('scale')
    ->to('1 1 1')
    ->delay('200')
    ->dur('1000')
    ->easing('ease-out');
/* Left side */
$aframe->scene()->entity('logo')->el()->entity(1)->el()->box()
    ->width(12.5)
    ->depth(1)
    ->height(30)
    ->color('#EF2D5E')
    ->position(0, 15, 0);
$aframe->scene()->entity('logo')->el()->entity(1)->el()->box()->el()->entity()
    ->rotation(-140, 0, 0)
    ->position(0, 15, 0)
    ->scale(1, 0, 1);
$aframe->scene()->entity('logo')->el()->entity(1)->el()->box()->el()->entity()->animation()
    ->attribute('scale')
    ->to('1 1 1')
    ->delay(800)
    ->dur(800)
    ->easing('ease-out');
$aframe->scene()->entity('logo')->el()->entity(1)->el()->box()->el()->entity()->el()->box(1)
    ->shader('flat')
    ->width(12.49)
    ->depth(.1)
    ->height(30)
    ->color('#24CAFF')
    ->position(0, 15, -.52);
$aframe->scene()->entity('logo')->el()->entity(1)->el()->box()->el()->entity()->el()->box(2)
    ->width(12.5)
    ->depth(1)
    ->height(30)
    ->color('#EF2D5E')
    ->position(0, 15, 0);

/* Cross-bar */
$aframe->scene()->entity('logo')->el()->entity(2)
    ->rotation(-90, 0, 0)
    ->position(0, 8, 7.5)
    ->scale(1, 0, 1);
$aframe->scene()->entity('logo')->el()->entity(2)->animation()
    ->attribute('scale')
    ->to('1 1 1')
    ->delay(800)
    ->dur(600)
    ->easing('ease-out');
$aframe->scene()->entity('logo')->el()->entity(2)->el()->box(1)
    ->shader('flat')
    ->width(12.45)
    ->depth(.1)
    ->height(14)
    ->color('#F2E646')
    ->position(0, 7, .52);
$aframe->scene()->entity('logo')->el()->entity(2)->el()->box(2)
    ->width(12.5)
    ->depth(1)
    ->height(14)
    ->color('#EF2D5E')
    ->position(0, 7, 0);


/* Clouds */
$aframe->scene()->entity('logo')->el()->entity(3)->el()->box(1)
    ->color('white')
    ->opacity(.25)
    ->width(18)
    ->depth(28)
    ->height(6)
    ->animation()
        ->attribute('position')
        ->from('-280 240 180')
        ->to('-280 240 340')
        ->delay(0)
        ->dur(36000)
        ->easing('linear')
        ->repeat('indefinite')
        ->fill('both');

$aframe->scene()->entity('logo')->el()->entity(3)->el()->box(2)
    ->color('white')
    ->opacity(.65)
    ->width(8)
    ->depth(12)
    ->height(4)
    ->animation()
        ->attribute('position')
        ->from('5 32 -80')
        ->to('5 32 120')
        ->delay(12000)
        ->dur(48000)
        ->easing('linear')
        ->repeat('indefinite')
        ->fill('both');

$aframe->scene()->entity('logo')->el()->entity(3)->el()->box(3)
    ->color('white')
    ->opacity(.75)
    ->width(6)
    ->depth(9)
    ->height(4)
    ->visible(false)
    ->animation(1)
        ->attribute('position')
        ->from('10 12 -10')
        ->to('10 12 100')
        ->delay(1000)
        ->dur(36000)
        ->easing('linear')
        ->repeat('indefinite')
        ->fill('both');
$aframe->scene()->entity('logo')->el()->entity(3)->el()->box(3)
    ->animation(2)
        ->attribute('visible')
        ->to('true')
        ->delay(1000)
        ->dur(1);

$aframe->scene()->entity('logo')->el()->entity(3)->el()->box(4)
    ->color('white')
    ->opacity(.5)
    ->width(8)
    ->depth(12)
    ->height(3)
    ->animation()
        ->attribute('position')
        ->from('20 16 -80')
        ->to('20 16 120')
        ->delay(200)
        ->dur(52000)
        ->easing('linear')
        ->repeat('indefinite')
        ->fill('both');


$aframe->scene()->entity('logo')->el()->entity(3)->el()->box(5)
    ->color('white')
    ->opacity(.8)
    ->width(8)
    ->depth(12)
    ->height(3)
    ->animation()
        ->attribute('position')
        ->from('-20 18 -50')
        ->to('-20 18 120')
        ->delay(200)
        ->dur(50000)
        ->easing('linear')
        ->repeat('indefinite')
        ->fill('both');

$aframe->scene()->entity('logo')->el()->entity(3)->el()->box(6)
    ->color('white')
    ->opacity(.75)
    ->width(5)
    ->depth(7)
    ->height(3)
    ->animation()
        ->attribute('position')
        ->from('26 20 -80')
        ->to('26 20 120')
        ->delay(20000)
        ->dur(48000)
        ->easing('linear')
        ->repeat('indefinite')
        ->fill('both');
/* Shadow */
$aframe->scene()->entity('logo')->el()->entity(4)
    ->rotation(-90, 0, 0);
$aframe->scene()->entity('logo')->el()->entity(4)->el()->plane()
    ->width(12.5)
    ->height(20)
    ->position(0, 0, .1)
    ->pivot(0, -10, 0)
    ->color('#21897C')
    ->animation()
        ->attribute('scale')
        ->from('1 0 1')
        ->to('1 1 1')
        ->easing('ease-out')
        ->delay(600)
        ->dur(1000)
        ->fill('both');

/* Base */
$aframe->scene()->entity('logo')->el()->entity(5)->el()->plane()
    ->width(30)
    ->height(30)
    ->color('#249889')
    ->rotation(-90, 0, 0)
    ->animation()
        ->attribute('position')
        ->from('0 -40 0')
        ->to('0 0 0')
        ->dur(1600)
        ->easing('ease-out');

/* Trees */
$aframe->scene()->entity('logo')->el()->entity(6)
    ->position(-10, .2, -10)
    ->el()->colladamodel()
        ->src('#tree')
        ->scale(2.5, 2.5, 2.5)
        ->visible(false);
$aframe->scene()->entity('logo')->el()->entity(6)->el()->colladamodel()->animation(1)
    ->attribute('position')
    ->from('0 10 0')
    ->to('0 0 0')
    ->delay(650)
    ->dur(800)
    ->easing('ease-out')
    ->fill('backwards');
$aframe->scene()->entity('logo')->el()->entity(6)->el()->colladamodel()->animation(2)
    ->attribute('visible')
    ->to('true')
    ->delay(800)
    ->dur(1);

$aframe->scene()->entity('logo')->el()->entity(7)
    ->position(-10, .2, 6)
    ->el()->colladamodel()
        ->src('#tree')
        ->scale(2.5, 2.5, 2.5)
        ->visible(false);
$aframe->scene()->entity('logo')->el()->entity(7)->el()->colladamodel()->animation(1)
    ->attribute('position')
    ->from('0 10 0')
    ->to('0 0 0')
    ->delay(400)
    ->dur(800)
    ->easing('ease-out')
    ->fill('backwards');
$aframe->scene()->entity('logo')->el()->entity(7)->el()->colladamodel()->animation(2)
    ->attribute('visible')
    ->to('true')
    ->delay(400)
    ->dur(1);

$aframe->scene()->entity('logo')->el()->entity(8)
    ->position(10, .2, 10)
    ->el()->colladamodel()
        ->src('#tree')
        ->scale(2.5, 2.5, 2.5)
        ->visible(false);
$aframe->scene()->entity('logo')->el()->entity(8)->el()->colladamodel()->animation(1)
    ->attribute('position')
    ->from('0 10 0')
    ->to('0 0 0')
    ->delay(600)
    ->dur(800)
    ->easing('ease-out')
    ->fill('backwards');
$aframe->scene()->entity('logo')->el()->entity(8)->el()->colladamodel()->animation(2)
    ->attribute('visible')
    ->to('true')
    ->delay(600)
    ->dur(1);

$aframe->scene()->sky()->color('#24CAFF')->radius(1000);
$aframe->scene()->light(1)->type('directional')->color('#FFF')->intensity(.45)->position(4, 2, 1);
$aframe->scene()->light(2)->type('ambient')->color('#A8A8A8');

/* Render scene */
$aframe->scene()->render();