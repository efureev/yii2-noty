<?php

namespace efureev\noty;

class AppMessageAsset extends \yii\web\AssetBundle
{

    public $sourcePath = '@efureev/noty/assets';

    public $js = [
        'app.msg.js'
    ];

    public $depends = [
        'efureev\noty\NotyAsset',
    ];
}