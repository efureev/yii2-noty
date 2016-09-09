<?php

namespace efureev\tests\unit\iziModal;

use efureev\iziModal\AppModalAsset;
use efureev\iziModal\IziModalAsset;
use efureev\iziModal\IziModalWidget;
use yii\web\View;

/**
 * Class MainTest
 *
 * @package efureev\tests\unit\iziModal
 */
class MainTest extends \efureev\tests\unit\TestCase
{

    public function testMain()
    {
        $this->assertInstanceOf('efureev\iziModal\IziModalWidget', new IziModalWidget());
        $this->assertInstanceOf('efureev\iziModal\IziModalAsset', new IziModalAsset());
        $this->assertInstanceOf('efureev\iziModal\AppModalAsset', new AppModalAsset());
    }


    public function testOne()
    {
        $input = new IziModalWidget();
        $input->run();
        $view = $input->view;

        $jsArray = $view->js[ View::POS_READY ];
        $jsArray = array_flip($jsArray);

        $this->assertTrue(array_key_exists("$('#w1').iziModal();" . PHP_EOL . "app.modal.init('w1');", $jsArray));
    }

    public function testTwo()
    {
        $input = new IziModalWidget(['options' => ['id' => 'element']]);
        $input->run();
        $view = $input->view;

        $jsArray = $view->js[ View::POS_READY ];
        $jsArray = array_flip($jsArray);

        $this->assertTrue(array_key_exists("$('#element').iziModal();" . PHP_EOL . "app.modal.init('element');", $jsArray));
    }

    public function testThree()
    {
        $input = IziModalWidget::begin(['options' => ['id' => 'element']]);
        $input::end();
        $jsArray = $input->view->js[ View::POS_READY ];
        $jsArray = array_flip($jsArray);
        $this->assertTrue(array_key_exists("$('#element').iziModal();" . PHP_EOL . "app.modal.init('element');", $jsArray));
    }

    public function testInfo()
    {
        $el = 'app-modal';
        ob_start();
        ob_implicit_flush(false);
        IziModalWidget::info($el);
        $out = ob_get_clean();

        $this->assertEquals($out, '<div id="' . $el . '" class="iziModal" aria-hidden></div>');
    }

    public function testAlert()
    {
        $el = 'app-modal';
        ob_start();
        ob_implicit_flush(false);
        IziModalWidget::alert($el);
        $out = ob_get_clean();

        $this->assertEquals($out, '<div id="' . $el . '" class="iziModal" aria-hidden></div>');
    }

    public function testSuccess()
    {
        $el = 'app-modal';
        ob_start();
        ob_implicit_flush(false);
        IziModalWidget::success($el);
        $out = ob_get_clean();

        $this->assertEquals($out, '<div id="' . $el . '" class="iziModal" aria-hidden></div>');
    }
}