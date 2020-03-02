# php-statistics

[![Build Status](https://travis-ci.org/Oefenweb/php-statistics.svg?branch=master)](https://travis-ci.org/Oefenweb/php-statistics)
[![PHP 7 ready](http://php7ready.timesplinter.ch/Oefenweb/php-statistics/badge.svg)](https://travis-ci.org/Oefenweb/php-statistics)
[![codecov](https://codecov.io/gh/Oefenweb/php-statistics/branch/master/graph/badge.svg)](https://codecov.io/gh/Oefenweb/php-statistics)
[![Packagist downloads](http://img.shields.io/packagist/dt/Oefenweb/statistics.svg)](https://packagist.org/packages/oefenweb/statistics)
[![Code Climate](https://codeclimate.com/github/Oefenweb/php-statistics/badges/gpa.svg)](https://codeclimate.com/github/Oefenweb/php-statistics)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Oefenweb/php-statistics/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Oefenweb/php-statistics/?branch=master)

Statistics library for PHP.

## Requirements

* PHP 7.0.0 or greater.

## Usage

### Sum
```php
use Oefenweb\Statistics\Statistics;

Statistics::sum([1, 2, 3]); // 6
```

### Minimum
```php
use Oefenweb\Statistics\Statistics;

Statistics::min([1, 2, 3]); // 1
```

### Maximum
```php
use Oefenweb\Statistics\Statistics;

Statistics::max([1, 2, 3]); // 3
```

### Mean
```php
use Oefenweb\Statistics\Statistics;

Statistics::mean([1, 2, 3]); // 2
```

### Frequency
```php
use Oefenweb\Statistics\Statistics;

Statistics::frequency([1, 2, 3, 3, 3]); // [1 => 1, 2 => 1, 3 => 3]
```

### Mode
```php
use Oefenweb\Statistics\Statistics;

Statistics::mode([1, 2, 2, 3]); // 2
```

### Variance (sample and population)
```php
use Oefenweb\Statistics\Statistics;

Statistics::variance([1, 2, 3]); // 1
Statistics::variance([1, 2, 3], false); // 0.66666666666667
```

### Standard deviation (sample and population)
```php
use Oefenweb\Statistics\Statistics;

Statistics::standardDeviation([1, 2, 3]); // 1.0
Statistics::standardDeviation([1, 2, 3], false); // 0.81649658092773
```

### Range
```php
use Oefenweb\Statistics\Statistics;

Statistics::range([4, 6, 10, 15, 18]); // 14
```
