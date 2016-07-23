<?php
/* Common bootstrap for examples */
include dirname(__DIR__,2).DIRECTORY_SEPARATOR.'examples-bootstrap.php';

/* $aframe->scene(); === Anonymous scene */
$aframe->scene()->title('3D Model • A-Frame');
$aframe->scene()->description('3D Model • A-Frame');

$aframe->scene()->asset()->item('tree')
    ->src('models/tree2/tree2.dae');

$aframe->scene()->colladamodel()
    ->src('#tree')
    ->rotation(0, 45, 0);

$aframe->scene()->sky()
    ->color('#ECECEC');

/* Render scene */
$aframe->scene()->render();