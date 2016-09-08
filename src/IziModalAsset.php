<?php

namespace efureev\iziModal;

class IziModalAsset extends \yii\web\AssetBundle
{

    public $sourcePath = '@bower/fe-iziModal';

    public $js = [
        'dist/izimodal.min.js'
    ];

    public $css = [
        'dist/izimodal.min.css',
    ];
}