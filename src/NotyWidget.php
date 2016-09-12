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
    /** @var array options for widget */
    public $options = [];

    public $clientOptions = [];

    public function init()
    {
        NotyAsset::register($this->view);
    }

    public function run()
    {
        $opts = !empty($this->clientOptions) ? Json::encode($this->clientOptions) : "{}";
        $this->view->registerJs("var notyOpts = ".$opts);
    }
}