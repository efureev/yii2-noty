<?php

namespace efureev\iziModal;

class AppModalAsset extends \yii\web\AssetBundle
{

    public $sourcePath = '@efureev/noty/assets';

    public $js = [
        'app.msg.js'
    ];

    public $depends = [
        'efureev\noty\NotyAsset',
    ];
}