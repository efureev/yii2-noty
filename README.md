yii2-iziModal
==============

[![GitHub version](https://badge.fury.io/gh/efureev%2Fyii2-iziModal.svg)](https://badge.fury.io/gh/efureev%2Fyii2-iziModal) [![Build Status](https://travis-ci.org/efureev/yii2-iziModal.svg?branch=master)](https://travis-ci.org/efureev/yii2-iziModal) [![Dependency Status](https://gemnasium.com/badges/github.com/efureev/yii2-iziModal.svg)](https://gemnasium.com/github.com/efureev/yii2-iziModal) ![](https://reposs.herokuapp.com/?path=efureev/yii2-iziModal) [![Code Climate](https://codeclimate.com/github/efureev/yii2-iziModal/badges/gpa.svg)](https://codeclimate.com/github/efureev/yii2-iziModal) [![Test Coverage](https://codeclimate.com/github/efureev/yii2-iziModal/badges/coverage.svg)](https://codeclimate.com/github/efureev/yii2-iziModal/coverage)

_Wrapper for [https://github.com/efureev/iziModal](https://github.com/efureev/iziModal)_

![capa](http://i.imgur.com/TPdnES8.png)

![2016-09-09_17-15-59](https://cloud.githubusercontent.com/assets/5524684/18386573/b47698a6-76b9-11e6-8cce-7bad8d7ba7b0.png)


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

### Example 3
```html
<button id="btn-izimodal-custom">custom</button>
<button id="btn-izimodal-alert">Alert</button>
<button id="btn-izimodal-success">Succes</button>
<button id="btn-izimodal-refresh">Refresh</button>
```

```php
\efureev\iziModal\IziModalWidget::info('app-modal');

$this->registerJs("
        
    $('#btn-izimodal-refresh').on('click',function(e){
        app.modal.loading('loading list...');
    });
    
    $('#btn-izimodal-custom').on('click',function(e){
        app.modal.custom('Custom!');
    });
    $('#btn-izimodal-success').on('click',function(e){
        app.modal.success('Succes!'');
    });
    
    $('#btn-izimodal-alert').on('click',function(e){
        app.modal.alert('Alert text');
    });
");

```

### Example 4: types options
```html
<button id="btn-izimodal-custom">custom</button>
<button id="btn-izimodal-alert">Alert</button>
<button id="btn-izimodal-success">Succes</button>
<button id="btn-izimodal-info">Info</button>
<button id="btn-izimodal-refresh">Refresh</button>
```

```php
\efureev\iziModal\IziModalWidget::info('app-modal', [
    'typesOptions' => [
        'alert' => [
            'title' => 'Оспасносте!',
        ],
        'info' => [
            'icon' => null,
        ],
        'success' => [
            'color' => 'rgb(136, 200, 200)',
        ],
    ]
]);

$this->registerJs("
        
    $('#btn-izimodal-refresh').on('click',function(e){
        app.modal.loading('loading list...');
    });
    
    $('#btn-izimodal-info').on('click',function(e){
        app.modal.info('Infooo!');
    });

    $('#btn-izimodal-custom').on('click',function(e){
        app.modal.custom('Custom!');
    });
    
    $('#btn-izimodal-success').on('click',function(e){
        app.modal.success('Succes!');
    });
    
    $('#btn-izimodal-alert').on('click',function(e){
        app.modal.alert('Alert text');
    });
");

```

## Events

- Opening
- Opened
- Closing
- Closed
- Fullscreen

### Example 5
```html
<button id="btn-izimodal-custom" title="Title Test">click</button>
```

```php
\efureev\iziModal\IziModalWidget::info('app-modal');

$this->registerJs("
        
    $('#btn-izimodal-custom').on('click',function(e){
        var contentModal = $('<div>').css({padding:"20px 30px"}).html('test content');
        app.modal.custom({
                title : $(this).attr('title'),
                content : contentModal,
                footer : {
                    border: true,
                    items : [{
                        tag    : 'button',
                        class  : 'btn btn-primary btn-xs',
                        title  : 'Save',
                        onClick: function () {
                            var u = $('#users').val();
        
                            $.ajax({
                                url : '/users',
                                type: 'POST',
                                data: {dataUsers: u}
                            })
                                .error(function (resp) {
                                    throw new Error(resp.error);
                                })
                                .success(function (resp) {
                                    if (resp.error)
                                        throw new Error(resp.error);
                                    ...
                                });
                        }
                    }, {
                        tag  : 'button',
                        class: 'btn btn-primary btn-xs',
                        title: 'Close',
                        data : {
                            'izimodal-close': ''
                        }
                    }]
                },
                events : {
                    opening : function (event) {
                        console.log('opening');
                    },
                    closing : function (event) {
                        console.log('closing');
                    },
                    closed : function (event) {
                        console.log('closed');
                    }
                }
            });
    });
    
");

```


# Tests

`vendor/bin/phpunit`