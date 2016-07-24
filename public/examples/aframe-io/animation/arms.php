<?php
/* Common bootstrap for examples */
include dirname(__DIR__,2).DIRECTORY_SEPARATOR.'examples-bootstrap.php';

/* $aframe->scene(); === Anonymous scene */
$aframe->scene()->title('Arms • A-Frame');
$aframe->scene()->description('Arms • A-Frame');

$aframe->scene()->asset()->img('background')
    ->src('img/black-grid.png');

/* Directly beneath the camera */
$aframe->scene()->entity(1)
    ->position(0, -10.1, -1)
    ->rotation(30, 180, 0);
$aframe->scene()->entity(1)->el()->sphere()
    ->radius(7)
    ->color('#7BC8A4');
$aframe->scene()->entity(1)->el()->entity()->animation()
    ->attribute('rotation')
    ->to('45 100 100')
    ->dur(5000)
    ->delay(250)
    ->repeat('indefinite')
    ->direction('alternate');
$aframe->scene()->entity(1)->el()->entity()->el()->sphere()
    ->radius(1.5)
    ->color('#7BC8A4');
$aframe->scene()->entity(1)->el()->entity()->el()->cylinder()
    ->position(0, 5, 0)
    ->height(10)
    ->radius(0.075)
    ->color('#404040');
$aframe->scene()->entity(1)->el()->entity()->el()->entity()
    ->position(0, 10, 0)
    ->animation()
        ->attribute('rotation')
        ->to('90 90 0')
        ->dur('2000')
        ->delay(0)
        ->repeat('indefinite')
        ->direction('alternate');
$aframe->scene()->entity(1)->el()->entity()->el()->entity()->el()->sphere()
    ->radius(1)
    ->color('#F16745');
$aframe->scene()->entity(1)->el()->entity()->el()->entity()->el()->cylinder()
    ->position(0, 5, 0)
    ->height(10)
    ->radius(0.075)
    ->color('#404040');
$aframe->scene()->entity(1)->el()->entity()->el()->entity()->el()->entity()
    ->position(0, 10, 0)
    ->animation()
        ->attribute('rotation')
        ->to('50 10 100')
        ->dur('2000')
        ->delay(0)
        ->repeat('indefinite')
        ->direction('alternate');
$aframe->scene()->entity(1)->el()->entity()->el()->entity()->el()->entity()->el()->sphere()
        ->radius(3)
        ->color('#4CC3D9');
$aframe->scene()->entity(1)->el()->entity()->el()->entity()->el()->entity()->el()->cylinder()
        ->position(0, 5, 0)
        ->height(10)
        ->radius(0.075)
        ->color('#404040');
$aframe->scene()->entity(1)->el()->entity()->el()->entity()->el()->entity()->el()->entity()
    ->position(0, 10, 0)
    ->animation()
        ->attribute('rotation')
        ->to('50 40 50')
        ->dur('2000')
        ->delay(250)
        ->repeat('indefinite')
        ->direction('alternate');
$aframe->scene()->entity(1)->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->sphere()
        ->radius(4.5)
        ->color('#FFC65D');
$aframe->scene()->entity(1)->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->cylinder()
        ->position(0, 5, 0)
        ->height(10)
        ->radius(0.075)
        ->color('#404040');
$aframe->scene()->entity(1)->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->entity()
    ->position(0, 10, 0)
    ->animation()
        ->attribute('rotation')
        ->to('90 90 0')
        ->dur('2000')
        ->delay(0)
        ->repeat('indefinite')
        ->direction('alternate');
$aframe->scene()->entity(1)->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->sphere()
        ->radius(1.5)
        ->color('#93648D');
$aframe->scene()->entity(1)->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->cylinder()
        ->position(0, 5, 0)
        ->height(10)
        ->radius(0.075)
        ->color('#404040');
$aframe->scene()->entity(1)->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->entity()
        ->position(0, 10, 0)
        ->el()->sphere()
            ->radius(1.5)
            ->color('#fff');

/* Distant orbit */
$aframe->scene()->entity(2)
    ->rotation(120, 40, 0)->scale(10, 10, 10)
    ->el()->entity()
        ->rotation(0, 0, 0)
        ->animation()
            ->attribute('rotation')->to('0 0 360')->dur(20000)->easing('linear')->repeat('indefinite');

$aframe->scene()->entity(2)->el()->entity()->el()->entity()
    ->position(-18.25, -5, 0)->rotation(0, 0, 0);
$aframe->scene()->entity(2)->el()->entity()->el()->entity()->el()->sphere()
    ->radius(.3)->color('#7e3f1a');
$aframe->scene()->entity(2)->el()->entity()->el()->entity()->el()->cylinder()
    ->position(0, 5, 0)->height(10)->radius(.015)->color('#7e3f1a');

$aframe->scene()->entity(2)->el()->entity()->el()->entity()->el()->entity()
    ->position(0, 10, 0)->rotation(0, 0, -36);
$aframe->scene()->entity(2)->el()->entity()->el()->entity()->el()->entity()->el()->sphere()
    ->radius(.5)->color('#372246');
$aframe->scene()->entity(2)->el()->entity()->el()->entity()->el()->entity()->el()->cylinder()
    ->position(0, 5, 0)->height(10)->radius(.015)->color('#7e3f1a');

$aframe->scene()->entity(2)->el()->entity()->el()->entity()->el()->entity()->el()->entity()
    ->position(0, 10, 0)->rotation(0, 0, -36);
$aframe->scene()->entity(2)->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->sphere()
    ->radius(.2)->color('#7e3f1a');
$aframe->scene()->entity(2)->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->cylinder()
    ->position(0, 5, 0)->height(10)->radius(.015)->color('#7e3f1a');

/* use reference */
$entity_ref = $aframe->scene()->entity(2)->el()->entity()->el()->entity()->el()->entity()->el()->entity();
$entity_ref->el()->entity()
    ->position(0, 10, 0)->rotation(0, 0, -36);
$entity_ref->el()->entity()->el()->sphere()
    ->radius(.7)->color('#372246');
$entity_ref->el()->entity()->el()->cylinder()
    ->position(0, 5, 0)->height(10)->radius(.015)->color('#7e3f1a');

$entity_ref->el()->entity()->el()->entity()
    ->position(0, 10, 0)->rotation(0, 0, -36);
$entity_ref->el()->entity()->el()->entity()->el()->sphere()
    ->radius(2)->color('#7e3f1a');
$entity_ref->el()->entity()->el()->entity()->el()->cylinder()
    ->position(0, 5, 0)->height(10)->radius(.015)->color('#7e3f1a');

$entity_ref->el()->entity()->el()->entity()->el()->entity()
    ->position(0, 10, 0)->rotation(0, 0, -36);
$entity_ref->el()->entity()->el()->entity()->el()->entity()->el()->sphere()
    ->radius(.25)->color('#7e3f1a');
$entity_ref->el()->entity()->el()->entity()->el()->entity()->el()->cylinder()
    ->position(0, 5, 0)->height(10)->radius(.015)->color('#7e3f1a');

$entity_ref->el()->entity()->el()->entity()->el()->entity()->el()->entity()
    ->position(0, 10, 0)->rotation(0, 0, -36);
$entity_ref->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->sphere()
    ->radius(.5)->color('#7e3f1a');
$entity_ref->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->cylinder()
    ->position(0, 5, 0)->height(10)->radius(.015)->color('#7e3f1a');

$entity_ref->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->entity()
    ->position(0, 10, 0)->rotation(0, 0, -36);
$entity_ref->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->sphere()
    ->radius(6)->color('#7e3f1a');
$entity_ref->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->cylinder()
    ->position(0, 5, 0)->height(10)->radius(.015)->color('#7e3f1a');

$entity_ref->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->entity()
    ->position(0, 10, 0)->rotation(0, 0, -36);
$entity_ref->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->sphere()
    ->radius(.3)->color('#7e3f1a');
$entity_ref->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->cylinder()
    ->position(0, 5, 0)->height(10)->radius(.015)->color('#7e3f1a');

$entity_ref->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->entity()
    ->position(0, 10, 0)->rotation(0, 0, -36);
$entity_ref->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->sphere()
    ->radius(.05)->color('#7e3f1a');
$entity_ref->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->cylinder()
    ->position(0, 5, 0)->height(10)->radius(.015)->color('#7e3f1a');
unset($entity_ref);

$aframe->scene()->entity(3)
    ->animation()
        ->attribute('rotation')->to('360 0 0')->dur(50000)->easing('linear')->repeat('indefinite')->direction('normal')->fill('none');
$a1 = $aframe->scene()->entity(3)->el()->entity();

$a1
->position(0, -20, -50)
->animation()
    ->attribute('rotation')->to('45 100 100')->dur(5000)->delay(250)->repeat('indefinite')->direction('alternate');
$a1->el()->sphere()
    ->radius(1.5)->color('#7BC8A4');
$a1->el()->cylinder()
    ->position(0, 5, 0)->height(10)->radius(0.075)->color('#404040');

$a1->el()->entity()
    ->position(0, 10, 0)
    ->animation()
        ->attribute('rotation')->to('90 90 0')->dur(2000)->delay(0)->repeat('indefinite')->direction('alternate');
$a1->el()->entity()->el()->sphere()
    ->radius(1)->color('#F16745');
$a1->el()->entity()->el()->cylinder()
    ->position(0, 5, 0)->height(10)->radius(0.075)->color('#404040');

$a1->el()->entity()->el()->entity()
    ->position(0, 10, 0)
    ->animation()
    ->attribute('rotation')->to('50 10 100')->dur(2000)->delay(0)->repeat('indefinite')->direction('alternate');
$a1->el()->entity()->el()->entity()->el()->sphere()
    ->radius(3)->color('#4CC3D9');
$a1->el()->entity()->el()->entity()->el()->cylinder()
    ->position(0, 5, 0)->height(10)->radius(0.075)->color('#404040');

$a1->el()->entity()->el()->entity()->el()->entity()
    ->position(0, 10, 0)
    ->animation()
    ->attribute('rotation')->to('50 40 50')->dur(2000)->delay(250)->repeat('indefinite')->direction('alternate');
$a1->el()->entity()->el()->entity()->el()->entity()->el()->sphere()
    ->radius(4.5)->color('#FFC65D');
$a1->el()->entity()->el()->entity()->el()->entity()->el()->cylinder()
    ->position(0, 5, 0)->height(10)->radius(0.075)->color('#404040');

$a1->el()->entity()->el()->entity()->el()->entity()->el()->entity()
    ->position(0, 10, 0)
    ->animation()
    ->attribute('rotation')->to('90 90 0')->dur(2000)->delay(0)->repeat('indefinite')->direction('alternate');
$a1->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->sphere()
    ->radius(1.5)->color('#93648D');
$a1->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->cylinder()
    ->position(0, 5, 0)->height(10)->radius(0.075)->color('#404040');

$a1->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->entity()
    ->position(0, 10, 0)
    ->el()->sphere()
        ->radius(1.5)->color('#FFF');
unset($a1);
$aframe->scene()->entity(4)
    ->animation()
        ->attribute('rotation')->to('360 360 0')->dur(20000)->easing('linear')->repeat('indefinite')->direction('normal')->fill('none');
$a2 = $aframe->scene()->entity(4)->el()->entity();

$a2
->position(0, -20, 100)
->animation()
    ->attribute('rotation')->to('45 100 100')->dur(20000)->delay(250)->repeat('indefinite')->direction('alternate');
$a2->el()->sphere()
    ->radius(1.5)->color('#7BC8A4');
$a2->el()->cylinder()
    ->position(0, 5, 0)->height(10)->radius(0.075)->color('#404040');

$a2->el()->entity()
    ->position(0, 10, 0)
    ->animation()
        ->attribute('rotation')->to('90 90 0')->dur(2000)->delay(250)->repeat('indefinite')->direction('alternate');
$a2->el()->entity()->el()->sphere()
    ->radius(1)->color('#F16745');
$a2->el()->entity()->el()->cylinder()
    ->position(0, 5, 0)->height(10)->radius(0.075)->color('#404040');

$a2->el()->entity()->el()->entity()
    ->position(0, 10, 0)
    ->animation()
        ->attribute('rotation')->to('50 10 100')->dur(2000)->delay(0)->repeat('indefinite')->direction('alternate');
$a2->el()->entity()->el()->entity()->el()->sphere()
    ->radius(3)->color('#4CC3D9');
$a2->el()->entity()->el()->entity()->el()->cylinder()
    ->position(0, 5, 0)->height(10)->radius(0.075)->color('#404040');

$a2->el()->entity()->el()->entity()->el()->entity()
    ->position(0, 10, 0)
    ->animation()
        ->attribute('rotation')->to('50 40 50')->dur(2000)->delay(250)->repeat('indefinite')->direction('alternate');
$a2->el()->entity()->el()->entity()->el()->entity()->el()->sphere()
    ->radius(4.5)->color('#FFC65D');
$a2->el()->entity()->el()->entity()->el()->entity()->el()->cylinder()
    ->position(0, 5, 0)->height(10)->radius(0.075)->color('#404040');

$a2->el()->entity()->el()->entity()->el()->entity()->el()->entity()
    ->position(0, 10, 0)
    ->animation()
        ->attribute('rotation')->to('90 90 0')->dur(2000)->delay(0)->repeat('indefinite')->direction('alternate');
$a2->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->sphere()
    ->radius(1.5)->color('#93648D');
$a2->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->cylinder()
    ->position(0, 5, 0)->height(10)->radius(0.075)->color('#404040');

$a2->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->entity()
    ->position(0, 10, 0)
    ->el()->sphere()
    ->radius(1.5)->color('#FFF');
unset($a2);

$aframe->scene()->entity(5)
->animation()
->attribute('rotation')->to('-360 360 -360')->dur(30000)->easing('linear')->repeat('indefinite')->direction('normal')->fill('none');
$a3 = $aframe->scene()->entity(5)->el()->entity();

$a3
->position(0, -20, 50)
->animation()
    ->attribute('rotation')->to('45 100 100')->dur(5000)->delay(250)->repeat('indefinite')->direction('alternate');
$a3->el()->sphere()
    ->radius(1.5)->color('#7BC8A4');
$a3->el()->cylinder()
    ->position(0, 5, 0)->height(10)->radius(0.075)->color('#404040');

$a3->el()->entity()
    ->position(0, 10, 0)
    ->animation()
        ->attribute('rotation')->to('90 90 0')->dur(2000)->delay(0)->repeat('indefinite')->direction('alternate');
$a3->el()->entity()->el()->sphere()
    ->radius(1)->color('#F16745');
$a3->el()->entity()->el()->cylinder()
    ->position(0, 5, 0)->height(10)->radius(0.075)->color('#404040');

$a3->el()->entity()->el()->entity()
    ->position(0, 10, 0)
    ->animation()
        ->attribute('rotation')->to('50 10 100')->dur(2000)->delay(0)->repeat('indefinite')->direction('alternate');
$a3->el()->entity()->el()->entity()->el()->sphere()
    ->radius(3)->color('#4CC3D9');
$a3->el()->entity()->el()->entity()->el()->cylinder()
    ->position(0, 5, 0)->height(10)->radius(0.075)->color('#404040');


$a3->el()->entity()->el()->entity()->el()->entity()
    ->position(0, 10, 0)
    ->animation()
        ->attribute('rotation')->to('50 40 50')->dur(2000)->delay(250)->repeat('indefinite')->direction('alternate');
$a3->el()->entity()->el()->entity()->el()->entity()->el()->sphere()
    ->radius(4.5)->color('#FFC65D');
$a3->el()->entity()->el()->entity()->el()->entity()->el()->cylinder()
    ->position(0, 5, 0)->height(10)->radius(0.075)->color('#404040');

$a3->el()->entity()->el()->entity()->el()->entity()->el()->entity()
    ->position(0, 10, 0)
    ->animation()
        ->attribute('rotation')->to('90 90 0')->dur(2000)->delay(0)->repeat('indefinite')->direction('alternate');
$a3->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->sphere()
    ->radius(1.5)->color('#93648D');
$a3->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->cylinder()
    ->position(0, 5, 0)->height(10)->radius(0.075)->color('#404040');

$a3->el()->entity()->el()->entity()->el()->entity()->el()->entity()->el()->entity()
    ->position(0, 10, 0)
    ->el()->sphere()
        ->radius(1.5)->color('#FFF');
unset($a3);

$aframe->scene()->sky()->src('#background');
$aframe->scene()->light(1)
    ->type('directional')
    ->color('#FFF')
    ->intensity(.5);
$aframe->scene()->light(2)
    ->type('ambient')
    ->color('#461e06');

/* Render scene */
$aframe->scene()->render();