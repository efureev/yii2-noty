<?php

namespace efureev\iziModal;

class AppModalAsset extends \yii\web\AssetBundle
{

    public $sourcePath = '@efureev/iziModal/assets';

    public $js = [
        'app.modal.js'
    ];

    public $depends = [
        'efureev\iziModal\IziModalAsset',
    ];
}