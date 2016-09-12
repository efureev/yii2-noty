<?php

namespace efureev\noty;

use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;


/**
 * Class NotyWidget
 *
 * @package efureev\noty
 */
class NotyWidget extends Widget
{

    public $enableIcon = true;

    /** @var bool Enable Session Flash */
    public $enableSessionFlash = true;

    /** @var array options for widget */
    public $options = [];

    public $clientOptions = [];

    /** @var array Icons based on type */
    public $icons = [
        'error' => 'fa fa-times-circle',
        'success' => 'fa fa-check-circle',
        'information' => 'fa fa-info-circle',
        'warning' => 'fa fa-exclamation-circle',
        'alert' => 'fa fa-bell-o',
        'notification' => 'fa fa-bell-o',
    ];

    /**
     * @var array Alert types
     */
    public $types = [
        'error' => 'error',
        'success' => 'success',
        'information' => 'information',
        'warning' => 'warning',
        'alert' => 'alert'
    ];

    public function init()
    {
        AppMessageAsset::register($this->view);
    }

    public function run()
    {
        $opts = ArrayHelper::merge($this->getDefaultOptions(), $this->clientOptions);
        $this->view->registerJs("$.noty.appOptions = " . Json::encode($opts));

        if ($this->enableSessionFlash && ($flashes = \Yii::$app->session->getAllFlashes())) {
            $js= [];
            foreach($flashes as $type => $message) {
                if (empty($message)) {
                    continue;
                }
                $type = $this->verifyType($type);
                $icon = $this->getIcon($type);
                $text = is_array($message) ? $icon . implode(' ', $message) : $icon . $message;
                $js [] = "var {$type} = app.msg.flash('{$this->getId()}');";
                $js [] = "$.noty.setText({$type}.options.id, '{$text}');";
                $js [] = "$.noty.setType({$type}.options.id, '{$type}');";
            }
            $this->view->registerJs(implode(PHP_EOL,$js));
        }

    }

    protected function getDefaultOptions()
    {
        return [
            'template'  => '<div class="noty_message"><i class="noty-icon fa fa-check"></i><span class="noty_text"></span><div class="noty_close"></div></div>',
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

    /**
     * Get icon according to the type
     *
     * @param $type string
     *
     * @return string
     */
    protected function getIcon($type)
    {
        if (!$this->enableIcon) {
            return '';
        }
        $class = $this->icons[ $type ];

        return Html::tag('i', '', ['class' => $class]) . ' ';
    }

    protected function verifyType($type) {
        if (array_key_exists($type, $this->types)) {
            return $this->types[$type];
        }
        return 'notification';
    }

}