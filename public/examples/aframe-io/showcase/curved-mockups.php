<?php
/* Common bootstrap for examples */
include dirname(__DIR__,2).DIRECTORY_SEPARATOR.'examples-bootstrap.php';

/* $aframe->scene(); === Anonymous scene */
$aframe->scene()->title('Curved Mockups');
$aframe->scene()->description('Curved Mockups — A-Frame');

$aframe->scene()->asset()->img('mozvr')->src('img/mozvr.png');
$aframe->scene()->asset()->img('shadow2')->src('img/radial-shadow-2.png');
$aframe->scene()->asset()->img('ui1')->src('img/curved/ui-1.png');
$aframe->scene()->asset()->img('ui2')->src('img/curved/ui-2.png');
$aframe->scene()->asset()->img('ui3')->src('img/curved/ui-3.png');

$aframe->scene()->curvedimage(1)
    ->src('#ui3')
    ->thetaLength(180)
    ->height(9)
    ->rotation(0, 90, 0)
    ->scale(1.2, 1.2, 1.2)
    ->radius(5.7);

$aframe->scene()->curvedimage(2)
    ->src('#mozvr')
    ->radius(5.7)
    ->thetaLength(17)
    ->height(.36)
    ->opacity(0.2)
    ->rotation(0, 250, 0)
    ->position(0, 2, 0);

$aframe->scene()->curvedimage(3)
    ->src('#ui1')
    ->radius(5.7)
    ->thetaLength(72)
    ->height(2.6)
    ->rotation(0, 80, 0)
    ->position(0, 0.7, 0)
    ->scale(0.6, 0.6, 0.6);

$aframe->scene()->curvedimage(4)
    ->src('#ui2')
    ->radius(5.7)
    ->thetaLength(70)
    ->height(3.02)
    ->rotation(0, -130, 0)
    ->scale(0.8, 0.8, 0.8);

$aframe->scene()->image()
    ->src('#shadow2')
    ->position(0, -5, 0)
    ->rotation(-90, 0, 0)
    ->scale(6, 6, 6);

$aframe->scene()->sky()
    ->color('#fff');

$aframe->scene()->camera()->active(true)
    ->position(0, 1.8, 1.5);

/* Render scene */
$aframe->scene()->render();