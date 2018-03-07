<?php
/* Common bootstrap for examples */
include dirname(__DIR__,2).DIRECTORY_SEPARATOR.'examples-bootstrap.php';

/* $aframe->scene(); === Anonymous scene */
$aframe->scene()->title('360 Video • A-Frame');
$aframe->scene()->description('360 Video • A-Frame');

$aframe->scene()->asset()->video('video')
    ->src('https://ucarecdn.com/bcece0a8-86ce-460e-856b-40dac4875f15/')
    ->autoplay()
    ->loop();

$aframe->scene()->videosphere()
    ->src('#video')
    ->rotation(0, 180, 0);

/* Render scene */
$aframe->scene()->render();