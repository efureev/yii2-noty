<?php

namespace efureev\iziModal;

use yii\base\Widget;
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

    public $clientOptions = [];

    public function init()
    {
        parent::init();
        IziModalAsset::register($this->view);

        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }

        $this->registerScript();
    }

    public function registerScript()
    {
        $clientOptions = empty($this->clientOptions) ? '' : Json::encode($this->clientOptions);
        $js = "$('#{$this->options["id"]}').iziModal({$clientOptions});";
        $this->view->registerJs($js);
    }
}