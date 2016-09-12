<?php

namespace efureev\noty;

class NotyAsset extends \yii\web\AssetBundle
{

    public $sourcePath = '@bower/noty/js/noty/packaged';

    public $js = [
        'jquery.noty.packaged.min.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'efureev\noty\AnimateAsset',
    ];
}