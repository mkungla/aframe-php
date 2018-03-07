<?php
/* Common bootstrap for examples */
include dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'examples-bootstrap.php';

/* $aframe->scene(); === Anonymous scene */
$aframe->scene()->title('Composite');
$aframe->scene()->description('Composite — A-Frame');

$aframe->scene()->asset()->img('lake')
    ->src('img/lake.jpg');

$aframe->scene()->asset()->img('pdx')
    ->src('img/portland.png');

$aframe->scene()->asset()->item('sculpture')
    ->src('models/sculpture/sculpture.dae');

$aframe->scene()->sky()
    ->src('#lake');

$aframe->scene()->colladamodel()
    ->src('#sculpture')
    ->position(0, 0, - 2);

$aframe->scene()->image()
    ->src('#pdx')
    ->width(10)
    ->height(5)
    ->position(- 2, 1.2, 1.2)
    ->scale(.2, .2, .2);

/* Render scene */
$aframe->scene()->render();
