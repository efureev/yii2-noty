yii2-iziModal
==============

[![GitHub version](https://badge.fury.io/gh/efureev%2Fyii2-iziModal.svg)](https://badge.fury.io/gh/efureev%2Fyii2-iziModal) [![Build Status](https://travis-ci.org/efureev/yii2-iziModal.svg?branch=master)](https://travis-ci.org/efureev/yii2-iziModal) [![Dependency Status](https://gemnasium.com/badges/github.com/efureev/yii2-iziModal.svg)](https://gemnasium.com/github.com/efureev/yii2-iziModal) ![](https://reposs.herokuapp.com/?path=efureev/yii2-iziModal) [![Code Climate](https://codeclimate.com/github/efureev/yii2-iziModal/badges/gpa.svg)](https://codeclimate.com/github/efureev/yii2-iziModal) [![Test Coverage](https://codeclimate.com/github/efureev/yii2-iziModal/badges/coverage.svg)](https://codeclimate.com/github/efureev/yii2-iziModal/coverage)

_Wrapper for [https://github.com/efureev/iziModal](https://github.com/efureev/iziModal)_

[new]: http://i.imgur.com/41zuVDk.png "New label"
[bug]: http://i.imgur.com/92lu4ln.png "Bug label"

![capa](http://i.imgur.com/TPdnES8.png)

![2016-09-09_17-15-59](https://cloud.githubusercontent.com/assets/5524684/18386573/b47698a6-76b9-11e6-8cce-7bad8d7ba7b0.png)

___
### Install

Either run
```
composer require "efureev/yii2-izimodal: *"
```

or add

```
"efureev/yii2-fontawesome": "~2",
```

to the require section of your composer.json file.

___
### Methods

- **init** - Initialization iziModal to the element with options
```javascript
// @var string element : id of the element
// @var object|null options : global options
var options = {};
app.modal.init('element',options);
```

- **setTitle** - Set a title to modal
```javascript
// @var string
app.modal.setTitle('Custom Title');
```

- **setContent** - Set a html content to modal
```javascript
// @var string
app.modal.setContent('<p>Custom</p>');
```

- **setSubTitle** - Set a subTitle to modal
```javascript
// @var string
app.modal.setSubTitle('subTitle');
```

- **setIcon** - Set a icon to title
```javascript
// @var string
app.modal.setIcon('fa fa-check');
```

- **setHeaderColor** - Set the background header
```javascript
// @var string
app.modal.setHeaderColor('rgb(136, 160, 185)');
```

- **setAttached** - Set modal position: `bottom`|`top`|`center`
```javascript
// @var string: top => 'top', bottom => 'bottom', center => null
app.modal.setAttached('top');
```

- **setEvents** - Set events
```javascript
// @var object
app.modal.setEvents({
    opening: function (event) {
        app.task.data.getStatus().then(function () {

            var template = function (item) {
                return item.text = item.fullTitle;
            };

            inputCodes.select2({
                data             : app.task.data.taskList(),
                templateResult   : template,
                templateSelection: template
            });

        });
    }
});
```
#### Events list:

- Opening
- Opened
- Closing
- Closed
- Fullscreen


- **setFooter** - Set footer content
```javascript
// @var object|string
app.modal.setFooter('<button>Save me</button>');
```

```
app.modal.setFooter({
    opening: function (event) {
        console.log(event);
    }
});
```

- **show** - Opens the modal window
```javascript
app.modal.show();
```

- **close** - Closes the modal window
```javascript
app.modal.close();
```

- **toggle** - Change to the opposite of the current state
```javascript
app.modal.toggle();
```

- **alert** - show the alert window
```javascript
// @var string|object
app.modal.alert('Alarma!...');
```

```
app.modal.alert({
    title   : 'Alert',
    msg   : 'Alarma!...',
    icon    : 'fa fa-exclamation-triangle',
    color   : 'rgb(189, 91, 91)',
    position: null
});
```

- **success** - show the success window
```javascript
// @var string|object
app.modal.success('Custom message');
```

```
app.modal.success({
    title   : 'Success',
    position: 'top',
    msg: 'Custom message',
});
```

- **loading** - show the loading window
```javascript
// @var string|object
app.modal.loading('Loading users...');
```

```
app.modal.loading({
    position: null,
    msg: 'Loading users...',
});
```

- **custom** - show the custom window
```javascript
// @var string|object
app.modal.custom('Loading users...');
```

```
app.modal.custom({
    title   : 'Alert',
    msg   : 'Alarma!...',
    icon    : 'fa fa-exclamation-triangle',
    color   : 'rgb(189, 91, 91)',
    position: null,
    content: '<p>Content</p>',
    footer: '<button>Save Me!</button>',
    events: {
        opening: function (event) {
            console.log(event);
        }
    },
});
```

___
### Run

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

### Example 5: Events
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