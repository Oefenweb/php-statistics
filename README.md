# php-statistics

[![Build Status](https://travis-ci.org/Oefenweb/php-statistics.svg?branch=master)](https://travis-ci.org/Oefenweb/php-statistics) [![PHP 7 ready](http://php7ready.timesplinter.ch/Oefenweb/php-statistics/badge.svg)](https://travis-ci.org/Oefenweb/php-statistics) [![Coverage Status](https://coveralls.io/repos/Oefenweb/php-statistics/badge.png)](https://coveralls.io/r/Oefenweb/php-statistics) [![Packagist downloads](http://img.shields.io/packagist/dt/Oefenweb/statistics.svg)](https://packagist.org/packages/oefenweb/statistics) [![Code Climate](https://codeclimate.com/github/Oefenweb/php-statistics/badges/gpa.svg)](https://codeclimate.com/github/Oefenweb/php-statistics)

Statistics library for PHP.

## Requirements

* PHP 5.3.10 or greater.

## Usage

### Sum
```
Statistics::sum(array(1, 2, 3));
```

### Minimum
```
Statistics::min(array(1, 2, 3));
```

### Maximum
```
Statistics::max(array(1, 2, 3));
```

### Mean
```
Statistics::mean(array(1, 2, 3));
```

### Frequency
```
Statistics::frequency(array(1, 2, 3, 3, 3));
```

### Mode
```
Statistics::mode(array(1, 2, 2, 3));
```

### Variance (sample and population)
```
Statistics::variance(array(1, 2, 3));
Statistics::variance(array(1, 2, 3), false);
```

### Standard deviation (sample and population)
```
Statistics::standardDeviation(array(1, 2, 3));
Statistics::standardDeviation(array(1, 2, 3), false);
```

### Range
```
Statistics::range(array(4, 6, 10, 15, 18));
```
