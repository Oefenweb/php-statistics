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

        $result = Statistics::sum($values);
        $expected = 14;

        $this->assertSame($expected, $result);
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

        $result = Statistics::sum($values);
        $expected = 10.5;

        $this->assertSame($expected, $result);
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

        $result = Statistics::sum($values);
        $expected = 9.5;

        $this->assertSame($expected, $result);
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

        $result = Statistics::min($values);
        $expected = 1;

        $this->assertSame($expected, $result);
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

        $result = Statistics::min($values);
        $expected = -1.0;

        $this->assertSame($expected, $result);
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

        $result = Statistics::max($values);
        $expected = 4;

        $this->assertSame($expected, $result);
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

        $result = Statistics::max($values);
        $expected = 5.75;

        $this->assertSame($expected, $result);
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

        $result = Statistics::mean($values);
        $expected = 2.8;

        $this->assertSame($expected, $result);
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

        $result = Statistics::mean($values);
        $expected = 2.625;

        $this->assertSame($expected, $result);
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

        $result = Statistics::mean($values);
        $expected = 1.9;

        $this->assertSame($expected, $result);
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

        $result = Statistics::frequency($values);
        $expected = [
            4 => 1,
            2 => 1,
            1 => 2,
            3 => 4,
        ];

        $this->assertEquals($expected, $result);
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

        $result = Statistics::frequency($values);
        $expected = [
            17 => 1,
            1 => 1,
            3 => 1,
            12 => 2,
            '7.12' => 2,
            6 => 4,
        ];

        $this->assertEquals($expected, $result);
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

        $result = Statistics::frequency($values);
        $expected = [
            'green' => 1,
            'blue' => 2,
            'red' => 4,
        ];

        $this->assertEquals($expected, $result);
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

        $result = Statistics::mode($values);
        $expected = 3;

        $this->assertSame($expected, $result);

        $values = [1, 1, 2, 3, 3, 3, 3, 4];

        $result = Statistics::mode($values);
        $expected = 3;

        $this->assertSame($expected, $result);

        $values = [1, 3, 6, 6, 6, 6, 7, 7, 12, 12, 17];

        $result = Statistics::mode($values);
        $expected = 6;

        $this->assertSame($expected, $result);
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

        $result = Statistics::mode($values);
        $expected = 'red';

        $this->assertSame($expected, $result);
    }

    /**
     * Tests `mode`.
     *
     * @return void
     * @expectedException \Oefenweb\Statistics\StatisticsError
     */
    public function testModeNotExactlyOne()
    {
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

        $result = Statistics::variance($values, $sample);
        $expected = 4.571429;

        $this->assertEquals($expected, $result, '', pow(10, -4));
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

        $result = Statistics::variance($values, $sample);
        $expected = 1.428571;

        $this->assertEquals($expected, $result, '', pow(10, -4));
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

        $result = Statistics::variance($values, $sample);
        $expected = 4;

        $this->assertSame($expected, $result);
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

        $result = Statistics::variance($values, $sample);
        $expected = 1.25;

        $this->assertSame($expected, $result, '', pow(10, -4));
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

        $result = Statistics::standardDeviation($values, $sample);
        $expected = 2.13809;

        $this->assertEquals($expected, $result, '', pow(10, -4));
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

        $result = Statistics::standardDeviation($values, $sample);
        $expected = 1.081087;

        $this->assertEquals($expected, $result, '', pow(10, -4));
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

        $result = Statistics::standardDeviation($values, $sample);
        $expected = 2.0;

        $this->assertSame($expected, $result);
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

        $result = Statistics::standardDeviation($values, $sample);
        $expected = 0.9868;

        $this->assertEquals($expected, $result, '', pow(10, -4));
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
        $result = Statistics::range($values);
        $expected = 14;

        $this->assertSame($expected, $result);
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
        $result = Statistics::range($values);
        $expected = 36;

        $this->assertSame($expected, $result);
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
        $result = Statistics::range($values);
        $expected = 11.2;

        $this->assertSame($expected, $result);
    }
}
