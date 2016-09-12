<?php

namespace efureev\noty;

use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 * Class NotyWidget
 *
 * @package efureev\noty
 */
class NotyWidget extends Widget
{
    /** @var array options for widget */
    public $options = [];

    public $clientOptions = [];

    public function init()
    {
        AppMessageAsset::register($this->view);
    }

    public function run()
    {
        $opts = ArrayHelper::merge($this->getDefaultOptions(),$this->clientOptions);
        $this->view->registerJs("$.noty.appOptions = " . Json::encode($opts));
    }

    protected function getDefaultOptions()
    {
        return [
            'theme'     => 'bootstrapTheme',
            'layout'    => 'topRight',
            'animation' => [
                'open'   => 'animated bounceInRight',
                'close'  => 'animated fadeOutUpBig',
                'easing' => 'swing',
                'speed'  => 500
            ],
        ];
    }
}