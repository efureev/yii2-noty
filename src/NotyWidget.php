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

    public $enableIcon = true;

    /** @var bool Enable Session Flash */
    public $enableSessionFlash = true;

    /** @var array options for widget */
    public $options = [];

    public $clientOptions = [];

    /** @var array Icons based on type */
    public $icons = [
        'error'        => 'fa fa-times-circle',
        'success'      => 'fa fa-check-circle',
        'info'         => 'fa fa-info-circle',
        'warning'      => 'fa fa-exclamation-circle',
        'alert'        => 'fa fa-bell-o',
        'notification' => 'fa fa-bell-o',
        'confirm'      => 'fa-question-circle-o',
    ];

    /** @var array Messages based on type */
    public $messages = [];
    public $defaultMessages = [
        'error'   => 'Error',
        'success' => 'Success',
        'info'    => 'Info',
        'warning' => 'Warning',
        'alert'   => 'Alert',
        'confirm' => 'Confirm',
    ];

    /**
     * @var array Alert types
     */
    public $types = [
        'error'   => 'error',
        'success' => 'success',
        'info'    => 'information',
        'warning' => 'warning',
        'alert'   => 'alert',
        'confirm' => 'confirm'
    ];

    public function init()
    {
        AppMessageAsset::register($this->view);
    }

    public function run()
    {
        $opts = ArrayHelper::merge($this->getDefaultOptions(), $this->clientOptions);
        $availableTypes = $this->getDefaultTypes();
        $this->view->registerJs("$.noty.appOptions = " . Json::encode($opts));
        $this->view->registerJs("$.noty.types = " . Json::encode($availableTypes));

        if ($this->enableSessionFlash && ($flashes = \Yii::$app->session->getAllFlashes())) {
            $js = [];
            foreach ($flashes as $type => $message) {
                if (empty($message)) {
                    continue;
                }
                $type = $this->verifyType($type);
                $icon = $this->getIcon($type);
                $text = is_array($message) ? implode('<br>', $message) : $message;
                $typeEl = $type . 'Noty';
                $js [] = "var {$typeEl} = app.msg.flash('{$this->getId()}',{icon:\"{$icon}\"});";
                $js [] = "$.noty.setText({$typeEl}.options.id, '{$text}');";
                $js [] = "$.noty.setType({$typeEl}.options.id, '{$type}');";
            }
            $this->view->registerJs(implode(PHP_EOL, $js));
        }

    }

    protected function getDefaultOptions()
    {
        return [
            'template'  => '<div class="noty_message"><i class="noty-icon {{%icon}}"></i> <span class="noty_text"></span><div class="noty_close"></div></div>',
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

        return $class = $this->icons[ $type ];
    }

    protected function verifyType($type)
    {
        if (array_key_exists($type, $this->types)) {
            return $this->types[ $type ];
        }

        return 'info';
    }

    protected function getDefaultTypes()
    {
        $result = [];
        $messages = ArrayHelper::merge($this->defaultMessages, $this->messages);
        foreach ($this->types as $type) {
            $result[ $type ] = [
                'icon' => $this->icons[ $type ],
                'msg'  => $messages[ $type ]
            ];
        }

        return $result;
    }

}