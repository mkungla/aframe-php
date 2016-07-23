<?php
/* Common bootstrap for examples */
include dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'examples-bootstrap.php';

/* $aframe->scene(); === Anonymous scene */
$aframe->scene()->title('Spheres and Fog');
$aframe->scene()->description('Spheres and Fog — A-Frame');

$aframe->scene()->fog()
->color('#AAB')
->near(0)
->far(30);

$aframe->scene()->asset()->img('highlight1')->src('img/radial-highlight.png');
$aframe->scene()->asset()->img('shadow3')->src('img/radial-shadow-3.png');

/* Ground Highlight */
$aframe->scene()->image()
    ->position(0, -.2, 5)
    ->src('#highlight1')
    ->rotation(-90, 0, 0)
    ->scale(30, 30, 30);

/* Orange */
$aframe->scene()->entity(1)
    ->position(0, 0, -5);
$aframe->scene()->entity(1)->child()->sphere()
    ->position(0, 4.2, 0)
    ->radius(4.2)
    ->color('#F16745')
    ->roughness(.8)
    ->segmentsWidth(52)
    ->segmentsHeight(52);
$aframe->scene()->entity(1)->child()->image()
    ->src('#shadow3')
    ->rotation(-90, 0, 0)
    ->scale(3, 3, 3);

/* Green */
$aframe->scene()->entity(2)
    ->position(-3, 0, 0);
    $aframe->scene()->entity(2)->child()->sphere()
    ->position(0, 1.75, 0)
    ->radius(1.75)
    ->color('#7BC8A4')
    ->roughness(.2);
    $aframe->scene()->entity(2)->child()->image()
    ->src('#shadow3')
    ->rotation(-90, 0, 0)
    ->scale(1.75, 1.75, 1.75);

/* Blue */
$aframe->scene()->entity(3)
    ->position(1, 0, 0);
    $aframe->scene()->entity(3)->child()->sphere()
    ->position(0, 1, 0)
    ->radius(1)
    ->color('#4CC3D9')
    ->metalness(.1);
    $aframe->scene()->entity(3)->child()->image()
    ->src('#shadow3')
    ->rotation(-90, 0, 0)
    ->scale(1, 1, 1);

/* Yellow */
$aframe->scene()->entity(4)
    ->position(3, 0, 1);
    $aframe->scene()->entity(4)->child()->sphere()
    ->position(0, .5, 0)
    ->radius(.5)
    ->color('#FFC65D');
    $aframe->scene()->entity(4)->child()->image()
    ->src('#shadow3')
    ->rotation(-90, 0, 0)
    ->scale(.5, .5, .5);

/* Purple */
$aframe->scene()->entity(5)
    ->position(20, 0, -2);
    $aframe->scene()->entity(5)->child()->sphere()
    ->position(0, 10, 0)
    ->radius(10)
    ->color('#93648D')
    ->segmentsWidth(52)
    ->segmentsHeight(52);
    $aframe->scene()->entity(5)->child()->image()
    ->src('#shadow3')
    ->rotation(-90, 0, 0)
    ->scale(9, 9, 9);

/* Yellow */
$aframe->scene()->entity(6)
    ->position(-24, 0, -34);
    $aframe->scene()->entity(6)->child()->sphere()
    ->position(0, 18, 0)
    ->radius(18)
    ->color('#FFC65D');
    $aframe->scene()->entity(6)->child()->image()
    ->src('#shadow3')
    ->rotation(-90, 0, 0)
    ->scale(8, 8, 8);

/* Green */
$aframe->scene()->entity(7)
    ->position(25, 0, 20);
    $aframe->scene()->entity(7)->child()->sphere()
    ->position(0, 12, 0)
    ->radius(12)
    ->color('#7BC8A4');
    $aframe->scene()->entity(7)->child()->image()
    ->src('#shadow3')
    ->rotation(-90, 0, 0)
    ->scale(8, 8, 8);

/* White */
$aframe->scene()->entity(8)
    ->position(-15, 0, 5);
    $aframe->scene()->entity(8)->child()->sphere()
    ->position(0, 3, 0)
    ->radius(3)
    ->color('#ECECEC');
    $aframe->scene()->entity(8)->child()->image()
    ->src('#shadow3')
    ->rotation(-90, 0, 0)
    ->scale(3, 3, 3);

/* Orange */
$aframe->scene()->entity(9)
    ->position(-6, 0, 6);
    $aframe->scene()->entity(9)->child()->sphere()
    ->position(0, 1, 0)
    ->radius(1)
    ->color('#F16745')
    ->roughness(.8);
    $aframe->scene()->entity(9)->child()->image()
    ->src('#shadow3')
    ->rotation(-90, 0, 0)
    ->scale(1, 1, 1);

/* Yellow */
$aframe->scene()->entity(10)
    ->position(-20, 0, 30);
    $aframe->scene()->entity(10)->child()->sphere()
    ->position(0, 30, 0)
    ->radius(30)
    ->color('#FFC65D')
    ->roughness(.6);
    $aframe->scene()->entity(10)->child()->image()
    ->src('#shadow3')
    ->rotation(-90, 0, 0)
    ->scale(15, 15, 15);

/* Blue */
$aframe->scene()->entity(11)
    ->position(-1, 0, 14);
    $aframe->scene()->entity(11)->child()->sphere()
    ->position(0, 2, 0)
    ->radius(2)
    ->color('#4CC3D9');
    $aframe->scene()->entity(11)->child()->image()
    ->src('#shadow3')
    ->rotation(-90, 0, 0)
    ->scale(2, 2, 2);

/* Orange */
$aframe->scene()->entity(12)
    ->position(10, 0, 15);
    $aframe->scene()->entity(12)->child()->sphere()
    ->position(0, 4, 0)
    ->radius(4)
    ->color('#F16745');
    $aframe->scene()->entity(12)->child()->image()
    ->src('#shadow3')
    ->rotation(-90, 0, 0)
    ->scale(2, 2, 2);

/* Blue */
$aframe->scene()->entity(13)
    ->position(6, 0, 4);
    $aframe->scene()->entity(13)->child()->sphere()
    ->position(0, 1.5, 0)
    ->radius(1.5)
    ->color('#4CC3D9');
    $aframe->scene()->entity(13)->child()->image()
    ->src('#shadow3')
    ->rotation(-90, 0, 0)
    ->scale(1.5, 1.5, 1.5);

/* Yellow */
$aframe->scene()->entity(14)
    ->position(5, 0, 14);
    $aframe->scene()->entity(14)->child()->sphere()
    ->position(0, .6, 0)
    ->radius(.6)
    ->color('#FFC65D');
    $aframe->scene()->entity(14)->child()->image()
    ->src('#shadow3')
    ->rotation(-90, 0, 0)
    ->scale(.6, .6, .6);

/* Purple */
$aframe->scene()->entity(15)
    ->position(5, 0, 25);
    $aframe->scene()->entity(15)->child()->sphere()
    ->position(0, 2, 0)
    ->radius(2)
    ->color('#93648D');
    $aframe->scene()->entity(15)->child()->image()
    ->src('#shadow3')
    ->rotation(-90, 0, 0)
    ->scale(2, 2, 2);

/* White */
$aframe->scene()->entity(16)
    ->position(2, 0, 15);
    $aframe->scene()->entity(16)->child()->sphere()
    ->position(0, .2, 0)
    ->radius(.2)
    ->color('#ECECEC');
    $aframe->scene()->entity(16)->child()->image()
    ->src('#shadow3')
    ->rotation(-90, 0, 0)
    ->scale(.2, .2, .2)
    ->opacity(.5);

/* Purple */
$aframe->scene()->entity(17)
    ->position(4, 0, 10);
    $aframe->scene()->entity(17)->child()->sphere()
    ->position(0, .15, 0)
    ->radius(.15)
    ->color('#93648D');
    $aframe->scene()->entity(17)->child()->image()
    ->src('#shadow3')
    ->rotation(-90, 0, 0)
    ->scale(.25, .25, .25)
    ->opacity(.6);

/* Blue */
$aframe->scene()->entity(18)
    ->position(4, 0, 11);
    $aframe->scene()->entity(18)->child()->sphere()
    ->position(0, .1, 0)
    ->radius(.1)
    ->color('#4CC3D9');
    $aframe->scene()->entity(18)->child()->image()
    ->src('#shadow3')
    ->rotation(-90, 0, 0)
    ->scale(.15, .15, .15)
    ->opacity(.6);

/* Green */
$aframe->scene()->entity(19)
    ->position(5, 0, 11);
    $aframe->scene()->entity(18)->child()->sphere()
    ->position(0, .3, 0)
    ->radius(.3)
    ->color('#7BC8A4');
    $aframe->scene()->entity(18)->child()->image()
    ->src('#shadow3')
    ->rotation(-90, 0, 0)
    ->scale(.25, .25, .25)
    ->opacity(.6);

/* Background */
$aframe->scene()->sky()->color('#AAB');


/* Render scene */
$aframe->scene()->render();
