<?php
namespace Oefenweb\Statistics\Test;

use Oefenweb\Statistics\Statistics;
use Oefenweb\Statistics\StatisticsError;
use PHPUnit\Framework\TestCase;

class StatisticsTest extends TestCase
{

    /**
     * Tests `sum`.
     *
     *  Integer values.
     *
     * @return void
     */
    public function testSumIntegers()
    {
            $values = [1, 2, 3, 4, 4];

            $actual = Statistics::sum($values);
            $expected = 14;

            $this->assertSame($expected, $actual);
    }

    /**
     * Tests `sum`.
     *
     *  Float values.
     *
     * @return void
     */
    public function testSum()
    {
            $values = [-1.0, 2.5, 3.25, 5.75];

            $actual = Statistics::sum($values);
            $expected = 10.5;

            $this->assertSame($expected, $actual);
    }

    /**
     * Tests `sum`.
     *
     *  Mixed values.
     *
     * @return void
     */
    public function testSumMixed()
    {
            $values = [-2, 2.5, 3.25, 5.75, 0];

            $actual = Statistics::sum($values);
            $expected = 9.5;

            $this->assertSame($expected, $actual);
    }

    /**
     * Tests `min`.
     *
     *  Integer values.
     *
     * @return void
     */
    public function testMinIntegers()
    {
            $values = [1, 2, 3, 4, 4];

            $actual = Statistics::min($values);
            $expected = 1;

            $this->assertSame($expected, $actual);
    }

    /**
     * Test for `min`.
     *
     *  Float values.
     *
     * @return void
     */
    public function testMinIntegersFloats()
    {
            $values = [-1.0, 2.5, 3.25, 5.75];

            $actual = Statistics::min($values);
            $expected = -1.0;

            $this->assertSame($expected, $actual);
    }

    /**
     * Tests `max`.
     *
     *  Integer values.
     *
     * @return void
     */
    public function testMaxIntegers()
    {
            $values = [1, 2, 3, 4, 4];

            $actual = Statistics::max($values);
            $expected = 4;

            $this->assertSame($expected, $actual);
    }

    /**
     * Tests `max`.
     *
     *  Float values.
     *
     * @return void
     */
    public function testMaxFloats()
    {
            $values = [-1.0, 2.5, 3.25, 5.75];

            $actual = Statistics::max($values);
            $expected = 5.75;

            $this->assertSame($expected, $actual);
    }

    /**
     * Tests `mean`.
     *
     *  Integer values.
     *
     * @return void
     */
    public function testMeanIntegers()
    {
            $values = [1, 2, 3, 4, 4];

            $actual = Statistics::mean($values);
            $expected = 2.8;

            $this->assertSame($expected, $actual);
    }

    /**
     * Tests `mean`.
     *
     *  Float values.
     *
     * @return void
     */
    public function testMeanFloats()
    {
            $values = [-1.0, 2.5, 3.25, 5.75];

            $actual = Statistics::mean($values);
            $expected = 2.625;

            $this->assertSame($expected, $actual);
    }

    /**
     * Tests `mean`.
     *
     *  Mixed values.
     *
     * @return void
     */
    public function testMeanMixed()
    {
            $values = [-2, 2.5, 3.25, 5.75, 0];

            $actual = Statistics::mean($values);
            $expected = 1.9;

            $this->assertSame($expected, $actual);
    }

    /**
     * Tests `frequency`.
     *
     *  Integer values.
     *
     * @return void
     */
    public function testFrequencyIntegers()
    {
            $values = [1, 1, 2, 3, 3, 3, 3, 4];

            $actual = Statistics::frequency($values);
            $expected = [
                    4 => 1,
                    2 => 1,
                    1 => 2,
                    3 => 4,
            ];

            $this->assertEquals($expected, $actual);
    }

    /**
     * Tests `frequency`.
     *
     *  Float values.
     *
     * @return void
     */
    public function testFrequencyFloats()
    {
            $values = [1, 3, 6, 6, 6, 6, 7.12, 7.12, 12, 12, 17];

            $actual = Statistics::frequency($values);
            $expected = [
                    17 => 1,
                    1 => 1,
                    3 => 1,
                    12 => 2,
                    '7.12' => 2,
                    6 => 4,
            ];

            $this->assertEquals($expected, $actual);
    }

    /**
     * Tests `frequency`.
     *
     *  String values.
     *
     * @return void
     */
    public function testFrequencyStrings()
    {
            $values = ['red', 'blue', 'blue', 'red', 'green', 'red', 'red'];

            $actual = Statistics::frequency($values);
            $expected = [
                    'green' => 1,
                    'blue' => 2,
                    'red' => 4,
            ];

            $this->assertEquals($expected, $actual);
    }

    /**
     * Tests `mode`.
     *
     *  Integer values.
     *
     * @return void
     */
    public function testModeIntegers()
    {
            $values = [3];

            $actual = Statistics::mode($values);
            $expected = 3;

            $this->assertSame($expected, $actual);

            $values = [1, 1, 2, 3, 3, 3, 3, 4];

            $actual = Statistics::mode($values);
            $expected = 3;

            $this->assertSame($expected, $actual);

            $values = [1, 3, 6, 6, 6, 6, 7, 7, 12, 12, 17];

            $actual = Statistics::mode($values);
            $expected = 6;

            $this->assertSame($expected, $actual);
    }

    /**
     * Tests `mode`.
     *
     *  String values.
     *
     * @return void
     */
    public function testModeStrings()
    {
            $values = ['red', 'blue', 'blue', 'red', 'green', 'red', 'red'];

            $actual = Statistics::mode($values);
            $expected = 'red';

            $this->assertSame($expected, $actual);
    }

    /**
     * Tests `mode`.
     *
     * @return void
     */
    public function testModeNotExactlyOne()
    {
            $this->expectException(StatisticsError::class);

            $values = [1, 1, 2, 4, 4];

            Statistics::mode($values);
    }

    /**
     * Tests `variance`.
     *
     *  Sample (default), integer values.
     *
     * @return void
     */
    public function testVarianceSampleIntegers()
    {
            $values = [2, 4, 4, 4, 5, 5, 7, 9];
            $sample = true;

            $actual = Statistics::variance($values, $sample);
            $expected = 4.571429;

            $this->assertEqualsWithDeltaPoly($expected, $actual);
    }

    /**
     * Tests `variance`.
     *
     *  Sample (default), float values.
     *
     * @return void
     */
    public function testVarianceSampleFloats()
    {
            $values = [0.0, 0.25, 0.25, 1.25, 1.5, 1.75, 2.75, 3.25];
            $sample = true;

            $actual = Statistics::variance($values, $sample);
            $expected = 1.428571;

            $this->assertEqualsWithDeltaPoly($expected, $actual);
    }

    /**
     * Tests `variance`.
     *
     *  Population, integer values.
     *
     * @return void
     */
    public function testVariancePopulationIntegers()
    {
            $values = [2, 4, 4, 4, 5, 5, 7, 9];
            $sample = false;

            $actual = Statistics::variance($values, $sample);
            $expected = 4;

            $this->assertSame($expected, $actual);
    }

    /**
     * Tests `variance`.
     *
     *  Population, float values.
     *
     * @return void
     */
    public function testVariancePopulationFloats()
    {
            $values = [0.0, 0.25, 0.25, 1.25, 1.5, 1.75, 2.75, 3.25];
            $sample = false;

            $actual = Statistics::variance($values, $sample);
            $expected = 1.25;

            $this->assertSame($expected, $actual, '', pow(10, -4));
    }

    /**
     * Test `variance`
     *
     * At least two data points.
     *
     * @return void
     */
    public function testVarianceNotAtLeastTwo()
    {
            $this->expectException(StatisticsError::class);

            $values = [1];
            Statistics::variance($values);
    }

    /**
     * Tests `standardDeviation`.
     *
     *  Sample (default), integers values.
     *
     * @return void
     */
    public function testStandardDeviationSampleIntegers()
    {
            $values = [2, 4, 4, 4, 5, 5, 7, 9];
            $sample = true;

            $actual = Statistics::standardDeviation($values, $sample);
            $expected = 2.13809;

            $this->assertEqualsWithDeltaPoly($expected, $actual);
    }

    /**
     * Tests `standardDeviation`.
     *
     *  Sample (default), float values.
     *
     * @return void
     */
    public function testStandardDeviationSampleFloats()
    {
            $values = [1.5, 2.5, 2.5, 2.75, 3.25, 4.75];
            $sample = true;

            $actual = Statistics::standardDeviation($values, $sample);
            $expected = 1.081087;

            $this->assertEqualsWithDeltaPoly($expected, $actual);
    }

    /**
     * Tests `standardDeviation`.
     *
     *  Population, integer values.
     *
     * @return void
     */
    public function testStandardDeviationPopulationIntegers()
    {
            $values = [2, 4, 4, 4, 5, 5, 7, 9];
            $sample = false;

            $actual = Statistics::standardDeviation($values, $sample);
            $expected = 2.0;

            $this->assertSame($expected, $actual);
    }

    /**
     * Tests `standardDeviation`.
     *
     *  Population, floats values.
     *
     * @return void
     */
    public function testStandardDeviationPopulationFloats()
    {
            $values = [1.5, 2.5, 2.5, 2.75, 3.25, 4.75];
            $sample = false;

            $actual = Statistics::standardDeviation($values, $sample);
            $expected = 0.9868;

            $this->assertEqualsWithDeltaPoly($expected, $actual);
    }

    /**
     * Tests `range`.
     *
     *  (Unsigned) integer values.
     *
     * @return void
     */
    public function testRangeIntUnsigned()
    {
            $values = [4, 6, 10, 15, 18];
            $actual = Statistics::range($values);
            $expected = 14;

            $this->assertSame($expected, $actual);
    }

    /**
     * Tests `range`.
     *
     *  (Signed) integer values.
     *
     * @return void
     */
    public function testRangeIntSigned()
    {
            $values = [4, 6, 10, 15, 18, -18];
            $actual = Statistics::range($values);
            $expected = 36;

            $this->assertSame($expected, $actual);
    }

    /**
     * Tests `range`.
     *
     *  Float values.
     *
     * @return void
     */
    public function testRangeFloats()
    {
            $values = [11, 13, 4.3, 15.5, 14];
            $actual = Statistics::range($values);
            $expected = 11.2;

            $this->assertSame($expected, $actual);
    }

    /**
     * Polyfill for `assertEqualsWithDelta`.
     *
     * @param mixed $expected
     * @param mixed $actual
     * @param float $delta
     */
    protected function assertEqualsWithDeltaPoly($expected, $actual, float $delta = 0.0001)
    {
        if (method_exists($this, 'assertEqualsWithDelta')) {
            $this->assertEqualsWithDelta($expected, $actual, $delta);
        } else {
            $this->assertEquals($expected, $actual, '', $delta);
        }
    }
}
