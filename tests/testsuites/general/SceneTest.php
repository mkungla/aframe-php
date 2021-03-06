<?php

class SceneTest extends PHPUnit_Framework_TestCase
{

    protected $aframe;

    protected function setUp()
    {
        $this->aframe = new \AframeVR\Aframe();
        $this->test_output_html = realpath(sys_get_temp_dir()) . DIRECTORY_SEPARATOR . 'aframe-php.html';
    }

    protected function tearDown()
    {
        if (file_exists($this->test_output_html))
            unlink($this->test_output_html);
    }

    public function test_title()
    {
        $default_title = $this->readAttribute($this->aframe->scene()
            ->dom(), 'scene_title');
        $this->assertEquals('Untitled', $default_title);

        $this->aframe->scene()->title('A-Frame PHPUnit test');
        $set_title = $this->readAttribute($this->aframe->scene()
            ->dom(), 'scene_title');
        $this->assertEquals('A-Frame PHPUnit test', $set_title);
    }

    public function test_description()
    {
        $default_description = $this->readAttribute($this->aframe->scene()
            ->dom(), 'scene_description');
        $this->assertEquals('', $default_description);

        $this->aframe->scene()->description('A-Frame PHPUnit test description');
        $set_description = $this->readAttribute($this->aframe->scene()
            ->dom(), 'scene_description');
        $this->assertEquals('A-Frame PHPUnit test description', $set_description);
    }

    public function test_rendering()
    {
        /* default $full = true, $print = true */
        ob_start();
        $this->aframe->scene()->render();
        $output = ob_get_clean();
        $this->assertEquals(substr($output, 0, 15), '<!DOCTYPE html>');

        /* $full = false, $print = true */
        ob_start();
        $this->aframe->scene()->render(true);
        $output = ob_get_clean();
        $this->assertEquals(substr($output, 0, 9), '<a-scene>');

        /* $full = true, $print = false */
        $this->assertEquals(substr($this->aframe->scene()
            ->save(), 0, 15), '<!DOCTYPE html>');

        /* $full = false, $print = false */
        $this->assertEquals(substr($this->aframe->scene()
            ->save(true), 0, 9), '<a-scene>');
    }

    public function test_save_file()
    {
        $this->aframe->scene()->save(false, $this->test_output_html);

        $this->assertFileExists($this->test_output_html);
    }

    public function test_getKeyword()
    {
        $this->assertInternalType('string', $this->aframe->scene()
            ->getKeyword());
    }

    public function test_images()
    {
        $this->assertInstanceOf('\AframeVR\Extras\Primitives\Image', $this->aframe->scene()
            ->image());
    }
    public function test_EntityChildrenFactory()
    {
        $this->assertInstanceOf('\AframeVR\Extras\Primitives\Box', $this->aframe->scene()
            ->entity()->el()->box(1));

        $this->assertInstanceOf('\AframeVR\Extras\Primitives\Sphere', $this->aframe->scene()
            ->entity()->el()->sphere(2));

        $this->assertInstanceOf('\AframeVR\Extras\Primitives\Cylinder', $this->aframe->scene()
            ->entity()->el()->cylinder(3));

        $this->assertInstanceOf('\AframeVR\Extras\Primitives\Plane', $this->aframe->scene()
            ->entity()->el()->plane(4));

        $this->assertInstanceOf('\AframeVR\Extras\Primitives\Camera', $this->aframe->scene()
            ->entity()->el()->camera(5));

        $this->assertInstanceOf('\AframeVR\Extras\Primitives\ColladaModel', $this->aframe->scene()
            ->entity()->el()->colladaModel(6));

        $this->assertInstanceOf('\AframeVR\Extras\Primitives\Image', $this->aframe->scene()
            ->entity()->el()->image(7));

        $this->assertInstanceOf('\AframeVR\Extras\Primitives\Light', $this->aframe->scene()
            ->entity()->el()->light(8));

        $this->assertInstanceOf('\AframeVR\Extras\Primitives\Video', $this->aframe->scene()
            ->entity()->el()->video(9));

        $this->assertInstanceOf('\AframeVR\Extras\Primitives\Torus', $this->aframe->scene()
            ->entity()->el()->torus(10));

        $this->assertInstanceOf('\AframeVR\Extras\Primitives\Ring', $this->aframe->scene()
            ->entity()->el()->ring(11));

        $this->assertInstanceOf('\AframeVR\Extras\Primitives\ObjModel', $this->aframe->scene()
            ->entity()->el()->objmodel(12));

        $this->assertInstanceOf('\AframeVR\Extras\Primitives\Curvedimage', $this->aframe->scene()
            ->entity()->el()->curvedimage(13));

        $this->assertInstanceOf('\AframeVR\Extras\Primitives\Cone', $this->aframe->scene()
            ->entity()->el()->cone(14));
    }

    public function test_scene_components()
    {
        /* canvas */
        $canvas = '\AframeVR\Core\Components\ascene\Canvas\CanvasComponent';
        $aframe = new \AframeVR\Aframe();
        $this->assertInstanceOf($canvas, $aframe->scene()
        ->canvas()->canvas()->height(100)->width(100));

        /* stats */
        $stats = '\AframeVR\Core\Components\ascene\Stats\StatsComponent';
        $this->assertInstanceOf($stats, $aframe->scene()
            ->stats());

        /* stats */
        $VRmodeUI = '\AframeVR\Core\Components\ascene\VRmodeUI\VRmodeUIComponent';
        $this->assertInstanceOf($VRmodeUI, $aframe->scene()
            ->VRmodeUI());

        /* fog */
        $fog = '\AframeVR\Core\Components\ascene\Fog\FogComponent';
        $this->assertInstanceOf($fog, $aframe->scene()
            ->fog()->near()->far()->density());

        /* Keyboard Shortcuts */
        $fog = '\AframeVR\Core\Components\ascene\KeyboardShortcuts\KeyboardShortcutsComponent';
        $this->assertInstanceOf($fog, $aframe->scene()
            ->KeyboardShortcuts());

        $aframe->scene()->attr('name','aframe-scene');
        $aframe->scene()->save();
    }

    public function test_scene_scripts()
    {
        $aframe = new \AframeVR\Aframe();
        $aframe->scene()->addScript('some-componet.js');

        $this->assertContains('some-componet.js', $aframe->scene()
            ->save());
    }

    public function test_scene_remote_scripts()
    {
        $aframe = new \AframeVR\Aframe();
        $aframe->scene()->addScript('http://example.com/some-componet.js');

        $this->assertContains('http://example.com/some-componet.js', $aframe->scene()
            ->save());
    }

    public function test_scene_attr()
    {
        $aframe = new \AframeVR\Aframe();
        $aframe->scene('my-scene')->attr('vr-mode-ui','enabled: false');
        $aframe->scene('my-scene')->attr('bool',true);
        $aframe->scene('my-scene')->attr('do-not-allow-int',50);

        $scene = $aframe->scene('my-scene')->save();

        $this->assertContains('vr-mode-ui="enabled: false"', $scene);
        $this->assertContains('bool=""', $scene);
        $this->assertNotContains('do-not-allow-int', $scene);
    }
}
