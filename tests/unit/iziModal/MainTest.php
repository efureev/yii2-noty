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

        $this->assertTrue(array_key_exists("$('#w1').iziModal();", $jsArray));
    }

    public function testTwo()
    {
        $input = new IziModalWidget(['options' => ['id' => 'element']]);
        $input->run();
        $view = $input->view;

        $jsArray = $view->js[ View::POS_READY ];
        $jsArray = array_flip($jsArray);

        $this->assertTrue(array_key_exists("$('#element').iziModal();", $jsArray));
    }

    public function testThree()
    {
        $input = IziModalWidget::begin(['options' => ['id' => 'element']]);
        $input::end();
        $jsArray = $input->view->js[ View::POS_READY ];
        $jsArray = array_flip($jsArray);
        $this->assertTrue(array_key_exists("$('#element').iziModal();", $jsArray));
    }
}