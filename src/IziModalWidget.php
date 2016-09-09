<?php

namespace efureev\iziModal;

use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;

/**
 * Class IziModalWidget
 *
 * @package efureev\iziModal
 */
class IziModalWidget extends Widget
{
    const THEME_LIGHT = 'light';

    /** @var string name of the theme to use */
    public $theme; //self::THEME_LIGHT;

    /** @var array options for widget */
    public $options = [];


    public $attached = 'bottom';

    public $clientOptions = [];

    public $appOptions = [];

    public function init()
    {
        AppModalAsset::register($this->view);

        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
    }

    public function run()
    {
        $this->registerScript();
    }

    public function registerScript()
    {
        $clientOptions = empty($this->clientOptions) ? '' : Json::encode($this->clientOptions);
        $appOptions = empty($this->appOptions) ? '{}': Json::encode($this->appOptions);

        $js[] = "$('#{$this->options["id"]}').iziModal({$clientOptions});";
        $js[] = "app.modal.init('" . $this->options["id"] . "'," . $appOptions . ");";
        $this->view->registerJs(implode(PHP_EOL, $js));
    }

    public static function set($id = null, $options = [], $appOptions = [])
    {
        $clientOptions = self::getDefaultOptions();

        $options = ArrayHelper::merge($clientOptions, $options);

        $izi = self::begin(
            [
                'options'       => ['id' => $id],
                'clientOptions' => $options,
                'appOptions'    => $appOptions
            ]);

        echo self::getHtml($izi->options['id']);

        $izi::end();
    }


    public static function alert($id = null)
    {
        self::set($id, [
            'title'       => 'Alert!',
            'icon'        => 'exclamation-triangle',
            'headerColor' => 'rgb(189, 91, 91)',
            'timeout'     => false,
            'attached'    => null,
        ]);
    }

    public static function success($id = null)
    {
        self::set($id, [
            'title'       => 'Success',
            'icon'        => 'check',
            'headerColor' => 'rgb(0, 175, 102)',
            'timeout'     => 2000,
        ]);
    }

    public static function info($id = null, $appOptions = [])
    {
        self::set($id, [
            'title'       => 'Info',
            'icon'        => 'info',
            'headerColor' => 'rgb(136, 160, 185)',
            'timeout'     => false,
            'attached'    => null
        ], $appOptions);
    }


    /**
     * Window
     *
     * @param $id
     */
    protected static function getHtml($id)
    {
        echo Html::tag('div', '', [
            'id'          => $id,
            'class'       => 'iziModal',
            'aria-hidden' => true
        ]);
    }

    protected static function getDefaultOptions()
    {
        return [
            'transitionIn' => 'fadeInUp',
            'history'      => false,
            'group'        => 'alert',
            'zindex'       => 1050,

            'timeoutProgressbar' => true,
            'timeout'            => 3000,
            'pauseOnHover'       => true,

            'attached' => 'top',
            'icon'     => 'info-circle',
            'title'    => 'Info',
            'subtitle' => '',
        ];
    }
}