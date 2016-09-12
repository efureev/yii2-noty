<?php

namespace efureev\noty;

/**
 * Class AssetBundle
 */
class FontawesomeAsset extends \yii\web\AssetBundle
{
    /**
     * @inherit
     */
    public $sourcePath = '@bower/components-font-awesome';
    /**
     * @inherit
     */
    public $css = [
        'css/font-awesome.min.css',
    ];
    /**
     * Initializes the bundle.
     * Set publish options to copy only necessary files (in this case css and font folders)
     *
     * @codeCoverageIgnore
     */
    public function init()
    {
        parent::init();
        $this->publishOptions['beforeCopy'] = function ($from) {
            return preg_match('%(/|\\\\)(fonts|css)%', $from);
        };
    }
}