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
"efureev/yii2-noty": "~2",
```

to the require section of your composer.json file.

___
### Methods

- **alert** - show the alert window
```javascript
// @var string|object
app.msg.alert('Alarma!...');
```


___
### Run

### Example 1
```php
\efureev\noty\NotyWidget::run();
```

```js
app.msg.alert('Alarma!');
```

# Tests

`vendor/bin/phpunit`