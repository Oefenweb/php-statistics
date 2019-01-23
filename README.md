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
```
Statistics::sum([1, 2, 3]);
```

### Minimum
```
Statistics::min([1, 2, 3]);
```

### Maximum
```
Statistics::max([1, 2, 3]);
```

### Mean
```
Statistics::mean([1, 2, 3]);
```

### Frequency
```
Statistics::frequency([1, 2, 3, 3, 3]);
```

### Mode
```
Statistics::mode([1, 2, 2, 3]);
```

### Variance (sample and population)
```
Statistics::variance([1, 2, 3]);
Statistics::variance([1, 2, 3], false);
```

### Standard deviation (sample and population)
```
Statistics::standardDeviation([1, 2, 3]);
Statistics::standardDeviation([1, 2, 3], false);
```

### Range
```
Statistics::range([4, 6, 10, 15, 18]);
```
