yii2-iziModal
==============

[![GitHub version](https://badge.fury.io/gh/efureev%2Fyii2-iziModal.svg)](https://badge.fury.io/gh/efureev%2Fyii2-iziModal) [![Build Status](https://travis-ci.org/efureev/yii2-iziModal.svg?branch=master)](https://travis-ci.org/efureev/yii2-iziModal) [![Dependency Status](https://gemnasium.com/badges/github.com/efureev/yii2-iziModal.svg)](https://gemnasium.com/github.com/efureev/yii2-iziModal) ![](https://reposs.herokuapp.com/?path=efureev/yii2-iziModal) [![Code Climate](https://codeclimate.com/github/efureev/yii2-iziModal/badges/gpa.svg)](https://codeclimate.com/github/efureev/yii2-iziModal) [![Test Coverage](https://codeclimate.com/github/efureev/yii2-iziModal/badges/coverage.svg)](https://codeclimate.com/github/efureev/yii2-iziModal/coverage)

# Run

### Example 1
```html
<button data-izimodal-open="izi-modal">Open</button>
```

```php
\efureev\iziModal\IziModalWidget::alert('izi-modal');
```

### Example 2
```html
<button id="btn-izimodal" data-izimodal-open="izi-modal">Open</button>
```

```php
\efureev\iziModal\IziModalWidget::alert('izi-modal');

$this->registerJs("
    var ic = 0;
    $('#btn-izimodal').on('click',function(e){
        ic++;
        $('#izi-modal').iziModal('setContent','no: '+ic);
    });
");

```


# Tests

`vendor/bin/phpunit`