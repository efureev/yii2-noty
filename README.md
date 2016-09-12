yii2-noty
=========

[![GitHub version](https://badge.fury.io/gh/efureev%2Fyii2-noty.svg)](https://badge.fury.io/gh/efureev%2Fyii2-noty) [![Build Status](https://travis-ci.org/efureev/yii2-noty.svg?branch=master)](https://travis-ci.org/efureev/yii2-noty) [![Dependency Status](https://gemnasium.com/badges/github.com/efureev/yii2-noty.svg)](https://gemnasium.com/github.com/efureev/yii2-noty) ![](https://reposs.herokuapp.com/?path=efureev/yii2-noty) [![Code Climate](https://codeclimate.com/github/efureev/yii2-noty/badges/gpa.svg)](https://codeclimate.com/github/efureev/yii2-noty) [![Test Coverage](https://codeclimate.com/github/efureev/yii2-noty/badges/coverage.svg)](https://codeclimate.com/github/efureev/yii2-noty/coverage)

_Wrapper for [https://github.com/efureev/noty](https://github.com/efureev/noty)_

[new]: http://i.imgur.com/41zuVDk.png "New label"
[bug]: http://i.imgur.com/92lu4ln.png "Bug label"

___
### Install

Either run
```
composer require "efureev/yii2-noty: *"
```

or add

```
"efureev/yii2-noty": "~1",
```

to the require section of your composer.json file.

___
### Methods

- **alert** - show the alert window
```javascript
// @var string|object
app.msg.alert('Alarma!...');
```

- **info** - show the info window
```javascript
// @var string|object
app.msg.info('Alarma!...');
```

- **error** - show the error window
```javascript
// @var string|object
app.msg.error('Alarma!...');
```

- **success** - show the success window
```javascript
// @var string|object
app.msg.success('Alarma!...');
```

- **warning** - show the warning window
```javascript
// @var string|object
app.msg.warning('Alarma!...');
```

- **confirm** - show the warning window
```javascript
// @var string|object
app.msg.confirm('Alarma!...');
//@var function onOkFn : function on click Ok
//@var function onCancelFn : function on click Cancel
//@var object callbacks : callbacks from noty
app.msg.confirm('Alarma!...',onOkFn, onCancelFn, callbacks);
```

(callbacks)[http://ned.im/noty/#/about]


___
### Run

### Example 1
```php
\efureev\noty\NotyWidget::widget();
```

```js
app.msg.error('Alarma!');
app.msg.success('You are winner!');
app.msg.success('You are winner!');
```

### Example 2: set Flashes
```php
app()->session->setFlash('warning', 'Warning.');
app()->session->setFlash('error', 'Error.');
app()->session->setFlash('info', 'Joke.');
```


# Tests

`vendor/bin/phpunit`