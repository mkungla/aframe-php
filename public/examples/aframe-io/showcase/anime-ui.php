<?php
/* Common bootstrap for examples */
include dirname(__DIR__,2).DIRECTORY_SEPARATOR.'examples-bootstrap.php';

/* $aframe->scene(); === Anonymous scene */
$aframe->scene()->title('Anime UI');
$aframe->scene()->description('Anime UI — A-Frame');

$aframe->scene()->asset()->item('engine')
    ->src('models/engine/engine.dae');

$aframe->scene()->asset()->mixin('image')
    ->geometry()
        ->primitive('plane')
        ->height(2)
        ->width(2);

/* You can set Assets url as relative to scene url */
$aframe->scene()->asset()->audio('blip1')->src('audio/321103__nsstudios__blip1.wav');
$aframe->scene()->asset()->audio('blip2')->src('audio/321104__nsstudios__blip2.wav');
$aframe->scene()->asset()->img('glow1')->src('img/engine/glow1.png');
$aframe->scene()->asset()->img('ring1')->src('img/engine/ring1.png');
$aframe->scene()->asset()->img('ring2')->src('img/engine/ring2.png');
$aframe->scene()->asset()->img('ring3')->src('img/engine/ring3.png');
$aframe->scene()->asset()->img('ring4')->src('img/engine/ring4.png');
$aframe->scene()->asset()->img('ring5')->src('img/engine/ring5.png');
$aframe->scene()->asset()->img('schematic1')->src('img/engine/schematic1.png');
$aframe->scene()->asset()->img('schematic2')->src('img/engine/schematic2.png');
$aframe->scene()->asset()->img('schematic3')->src('img/engine/schematic3.png');
$aframe->scene()->asset()->img('schematic4')->src('img/engine/schematic4.png');
$aframe->scene()->asset()->img('schematic5')->src('img/engine/schematic5.png');
$aframe->scene()->asset()->img('text1')->src('img/engine/text1.png');
$aframe->scene()->asset()->img('text2')->src('img/engine/text2.png');
$aframe->scene()->asset()->img('text3')->src('img/engine/text3.png');
$aframe->scene()->asset()->img('text4')->src('img/engine/text4.png');

$aframe->scene()->camera()
    ->active(true)
    ->position(1.75, 0, 1.2)
    ->rotation(0, 28, 0)
    ->near(0.1);

$aframe->scene()->colladamodel()
    ->src('#engine')
    ->position(0, 0, -3)
    ->rotation(90, 0, 0)
    ->scale(18, 18, 18);

/* Wall lights */
$aframe->scene()->entity('wall-lights')->position(-7.25, 1.5, 2.9)->rotation(0, 90, 0)->scale(1.25, 1.25, 1.25);
$delay = 300;
for($x = 0; $x <= 13; $x++) {
    $aframe->scene()->entity('wall-lights')->child()->entity($x)
        ->position($x, 0, 0)->scale(0.05, 0.05, 0.05);
    $aframe->scene()->entity('wall-lights')->child()->entity($x)->child()->plane(1)
        ->width(1)->height(4)->shader('flat')->color('#B4E2F8')
        ->animation()->attribute('visible')->from('false')->to('true')->delay($delay+=50)->dur(1)->fill('both');
    $aframe->scene()->entity('wall-lights')->child()->entity($x)->child()->plane(2)
        ->position(0, 0, -.01)->width(6)->height(4)->opacity(0.6)->color('#586266');
}

/* schematic-2 */
$aframe->scene()->entity('schematic-2')->position(0, 0, -6)->scale(0.7, 0.7, 0.7);
$aframe->scene()->entity('schematic-2')->child()->image(1)
    ->mixin('image')->src('#glow1')->position(0, 0, -2)->scale(5, 5, 5)
    ->animation()->attribute('visible')->from('false')->to('true')->delay(1500)->dur(1)->fill('both');
$aframe->scene()->entity('schematic-2')->child()->image(2)
    ->mixin('image')->src('#ring2')->position(0, 0, -1.2)->scale(1.75, 1.75, 1.75)
    ->animation()->attribute('visible')->from('false')->to('true')->delay(1400)->dur(1)->fill('both');
$aframe->scene()->entity('schematic-2')->child()->image(3)
    ->mixin('image')->src('#ring5')->position(0, -1.5, -2.1)->scale(1.2, 1.2, 1.2)
    ->animation()->attribute('visible')->from('false')->to('true')->delay(1550)->dur(1)->fill('both');
$aframe->scene()->entity('schematic-2')->child()->image(4)
    ->mixin('image')->src('#schematic5')->position(2.5, 0, -1.02)->scale(2, 2, 2)
    ->animation()->attribute('visible')->from('false')->to('true')->delay(1500)->dur(1)->fill('both');
$aframe->scene()->entity('schematic-2')->child()->image(5)
    ->mixin('image')->src('#schematic4')->position(0, -3, -1.01)->scale(1.5, 1.5, 1.5)->rotation(0, 0, 90)->opacity(0.75)
    ->animation()->attribute('visible')->from('false')->to('true')->delay(1500)->dur(1)->fill('both');
$aframe->scene()->entity('schematic-2')->child()->image(6)
    ->mixin('image')->src('#schematic3')->position(0, 2.7, -1)->scale(1, 1, 1)->opacity(0.75)
    ->animation()->attribute('visible')->from('false')->to('true')->delay(1450)->dur(1)->fill('both');
$aframe->scene()->entity('schematic-2')->child()->image(7)
    ->mixin('image')->src('#schematic1')->scale(2, 2, 2)
    ->animation()->attribute('visible')->from('false')->to('true')->delay(1400)->dur(1)->fill('both');
$aframe->scene()->entity('schematic-2')->child()->image(8)
    ->mixin('image')->src('#text2')->position(-1, 3, .02)->scale(.5, .5, .5)
    ->animation()->attribute('visible')->from('false')->to('true')->delay(1350)->dur(1)->fill('both');
$aframe->scene()->entity('schematic-2')->child()->image(9)
    ->mixin('image')->src('#text4')->position(-2, -2, .03)
    ->animation()->attribute('visible')->from('false')->to('true')->delay(1300)->dur(1)->fill('both');

/* schematic-1 */
$aframe->scene()->entity('schematic-1')->position(0, 0, -3);
$aframe->scene()->entity('schematic-1')->child()->image(1)
    ->mixin('image')->src('#schematic2')->scale(0.7, 0.7, 0.7)
    ->animation()->attribute('visible')->from('false')->to('true')->delay(1200)->dur(1)->fill('both');
$aframe->scene()->entity('schematic-1')->child()->image(2)
    ->mixin('image')->src('#text1')->scale(0.2, 0.2, 0.2)->position(2, 0, .02)
    ->animation()->attribute('visible')->from('false')->to('true')->delay(1200)->dur(1)->fill('both');
$aframe->scene()->entity('schematic-1')->child()->image(3)
    ->mixin('image')->src('#text3')->scale(0.4, 0.4, 0.4)->position(-1, 1, .01)
    ->animation()->attribute('visible')->from('false')->to('true')->delay(1200)->dur(1)->fill('both');

/* rings-group-3 */
$aframe->scene()->entity('rings-group-3')->position(0, 0, -2)->scale(0.5, 0.5, 0.5);
$aframe->scene()->entity('rings-group-3')->child()->image(1)
    ->mixin('image')->src('#ring3')->scale(.8, .8, .8)
    ->animation()->attribute('visible')->from('false')->to('true')->delay(1000)->dur(1)->fill('both');
$aframe->scene()->entity('rings-group-3')->child()->image(2)
    ->mixin('image')->src('#ring5')->scale(.9, .9, .9)->position(0, 0, .01)
    ->animation()->attribute('visible')->from('false')->to('true')->delay(1100)->dur(1)->fill('both');
$aframe->scene()->entity('rings-group-3')->child()->image(3)
    ->mixin('image')->src('#ring3')->position(0, 0, .02)
    ->animation(1)->attribute('visible')->from('false')->to('true')->delay(1100)->dur(1)->fill('both');
    $aframe->scene()->entity('rings-group-3')->child()->image(3)
    ->animation(2)->attribute('scale')->from('1 1 1')->to('1.2 1.2 1.2')->delay(1100)->dur(250)->fill('both')->easing('ease-out');

/* rings-group-2 */
$aframe->scene()->entity('rings-group-2')->position(0, 0, -1)->scale(0.5, 0.5, 0.5);
$aframe->scene()->entity('rings-group-2')->child()->image(1)
    ->mixin('image')->src('#ring2')->scale(1.2, 1.2, 1.2)->position(0, 0, .01)
    ->animation()->attribute('visible')->from('false')->to('true')->delay(800)->dur(1)->fill('both');
$aframe->scene()->entity('rings-group-2')->child()->image(2)
    ->mixin('image')->src('#text1')->scale(0.3, 0.3, 0.3)->position(0, 0, .02)
    ->animation()->attribute('visible')->from('false')->to('true')->delay(900)->dur(1)->fill('both');

/* rings-group-1 */
$aframe->scene()->entity('rings-group-1')->scale(0.6, 0.6, 0.6);
$aframe->scene()->entity('rings-group-1')->child()->image(1)
    ->mixin('image')->src('#ring5')->scale(1.2, 1.2, 1.2)->position(0, 0, 0)
    ->animation()->attribute('visible')->from('false')->to('true')->delay(600)->dur(1)->fill('both');
$aframe->scene()->entity('rings-group-1')->child()->image(2)
    ->mixin('image')->src('#ring4')->scale(1.2, 1.2, 1.2)->position(0, 0, .01)
    ->animation()->attribute('visible')->from('false')->to('true')->delay(600)->dur(1)->fill('both');
$aframe->scene()->entity('rings-group-1')->child()->image(3)
    ->mixin('image')->src('#ring3')->position(0, 0, .02)
    ->animation(1)->attribute('visible')->from('false')->to('true')->delay(700)->dur(1)->fill('both');
    $aframe->scene()->entity('rings-group-1')->child()->image(3)
    ->animation(2)->attribute('scale')->from('1 1 1')->to('1.25 1.25 1.25')->delay(700)->dur(250)->fill('both')->easing('ease-out');

/* Lights */
$aframe->scene()->light(1)
    ->type('point')
    ->color('#94c6ff')
    ->distance(15)
    ->position(0, 0, -12);


$aframe->scene()->light(2)
    ->type('point')
    ->color('#94c6ff')
    ->distance(17)
    ->position(0, 0, -6);
$aframe->scene()->light(3)
    ->type('ambient')
    ->color('#4f6487');

/* Sounds */
$aframe->scene()->entity()->sound()
    ->autoplay(true)
    ->src('#blip1');
$aframe->scene()->entity()->sound()
    ->autoplay(true)
    ->src('#blip2');
/* Render scene */
$aframe->scene()->render();
