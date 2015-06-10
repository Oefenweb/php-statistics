<?php
namespace Oefenweb\Statistics;

use Oefenweb\Statistics\StatisticsError;

/**
 * Statistics Library.
 *
 */
class Statistics
{

    /**
     * Calculates the sum for a given set of values.
     *
     * @param array $values The input values
     * @return float|int The sum of values as an integer or float
     */
    public static function sum($values)
    {
        return array_sum($values);
    }

    /**
     * Calculates the minimum for a given set of values.
     *
     * @param array $values The input values
     * @return float|int The minimum of values as an integer or float
     */
    public static function min($values)
    {
        return min($values);
    }

    /**
     * Calculates the maximum for a given set of values.
     *
     * @param array $values The input values
     * @return float|int The maximum of values as an integer or float
     */
    public static function max($values)
    {
        return max($values);
    }

    /**
     * Calculates the mean for a given set of values.
     *
     * @param array $values The input values
     * @return float|int The mean of values as an integer or float
     */
    public static function mean($values)
    {
        $numberOfValues = count($values);

        return self::sum($values) / $numberOfValues;
    }

    /**
     * Calculates the frequency table for a given set of values.
     *
     * @param array $values The input values
     * @return array The frequency table
     */
    public static function frequency($values)
    {
        $frequency = array();
        foreach ($values as $value) {
            // Floats cannot be indices
            if (is_float($value)) {
                $value = strval($value);
            }

            if (!isset($frequency[$value])) {
                $frequency[$value] = 1;
            } else {
                $frequency[$value] += 1;
            }
        }

        asort($frequency);

        return $frequency;
    }

    /**
     * Calculates the mode for a given set of values.
     *
     * @param array $values The input values
     * @return float|int The mode of values as an integer or float
     * @throws \Oefenweb\Statistics\StatisticsError
     */
    public static function mode($values)
    {
        $frequency = self::frequency($values);

        if (count($frequency) === 1) {
            return key($frequency);
        }

        $lastTwo = array_slice($frequency, -2, 2, true);
        $firstFrequency = current($lastTwo);
        $lastFrequency = next($lastTwo);

        if ($firstFrequency !== $lastFrequency) {
            return key($lastTwo);
        }

        throw new StatisticsError('There is not exactly one most common value.');
    }

    /**
     * Calculates the square of value - mean.
     *
     * @param float|int $value The input value
     * @param float|int $mean The mean
     * @return float|int The square of value - mean
     */
    protected static function squaredDifference($value, $mean)
    {
        return pow($value - $mean, 2);
    }

    /**
     * Calculates the variance for a given set of values.
     *
     * @param array $values The input values
     * @param bool $sample Whether or not to compensate for small samples (n - 1), defaults to true
     * @return float|int The variance of values as an integer or float
     */
    public static function variance($values, $sample = true)
    {
        $numberOfValues = count($values);
        $mean = self::mean($values);

        $squaredDifferences = array();
        foreach ($values as $value) {
            $squaredDifferences[] = self::squaredDifference($value, $mean);
        }
        $sumOfSquaredDifferences = self::sum($squaredDifferences);

        if ($sample) {
            $variance = $sumOfSquaredDifferences / ($numberOfValues - 1);
        } else {
            $variance = $sumOfSquaredDifferences / $numberOfValues;
        }

        return $variance;
    }

    /**
     * Calculates the standard deviation for a given set of values.
     *
     * @param array $values The input values
     * @param bool $sample Whether or not to compensate for small samples (n - 1), defaults to true
     * @return float|int The standard deviation of values as an integer or float
     */
    public static function standardDeviation($values, $sample = true)
    {
        return sqrt(self::variance($values, $sample));
    }

    /**
     * Calculates the range for a given set of values.
     *
     * @param array $values The input values
     * @return float|int The range of values as an integer or float
     */
    public static function range($values)
    {
        return self::max($values) - self::min($values);
    }
}
