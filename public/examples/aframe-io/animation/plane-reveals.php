<?php
/* Common bootstrap for examples */
include dirname(__DIR__,2).DIRECTORY_SEPARATOR.'examples-bootstrap.php';

/* $aframe->scene(); === Anonymous scene */
$aframe->scene()->title('Pivot Reveals');
$aframe->scene()->description('Pivot Reveals');

$aframe->scene()->asset()->mixin('plane')->geometry()
    ->primitive('plane')
    ->height(1)
    ->width(4);

$aframe->scene()->asset()->mixin('plane')->pivot('-2 .5 0');
$aframe->scene()->asset()->img('background')->src('img/gray-gradient.jpg');

/* Series of planes that use pivot, position, and animated scales to reveal themselves. */
$aframe->scene()->entity()
    ->position(-2, -1, -3)
    ->rotation(0, 35, 0);

$aframe->scene()->entity()->el()->plane(1)
    ->mixin('plane')
    ->position(0, 6, 0)
    ->color('#F16745')
    ->animation()
        ->attribute('scale')
        ->from('1 0 1')
        ->to('1 1 1')
        ->dur(750)
        ->delay(500)
        ->fill('backwards');
$aframe->scene()->entity()->el()->plane(2)
    ->mixin('plane')
    ->position(0, 4, 0)
    ->color('#7BC8A4')
    ->animation()
        ->attribute('scale')
        ->from('0 1 1')
        ->to('1 1 1')
        ->dur(750)
        ->delay(500)
        ->fill('backwards');
$aframe->scene()->entity()->el()->plane(3)
    ->mixin('plane')
    ->position(0, 2, 0)
    ->color('#4CC3D9')
    ->animation(1)
        ->attribute('scale')
        ->from('0 0 0')
        ->to('1 0.05 1')
        ->dur(500)
        ->delay(500)
        ->fill('backwards');
$aframe->scene()->entity()->el()->plane(3)
    ->animation(2)
        ->attribute('scale')
        ->from('1 0.05 1')
        ->to('1 1 1')
        ->dur(250)
        ->delay(1000)
        ->fill('both');
$aframe->scene()->entity()->el()->plane(4)
    ->mixin('plane')
    ->position(0, 0, 0)
    ->color('#EF2D5E')
    ->animation()
        ->attribute('rotation')
        ->from('90 0 0')
        ->to('0 0 0')
        ->dur(750)
        ->delay(500)
        ->fill('backwards');

$aframe->scene()->sky()->src('#background');
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