<?php

namespace efureev\iziModal;

class IziModalAsset extends \yii\web\AssetBundle
{

    public $sourcePath = '@bower/fe-iziModal';

    public $js = [
        'js/iziModal.min.js'
    ];

    public $css = [
        'css/iziModal.min.css',
    ];
}