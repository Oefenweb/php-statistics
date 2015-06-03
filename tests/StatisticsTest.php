<?php
require sprintf('%s/../src/Statistics.php', dirname(__FILE__));

class StatisticsTest extends PHPUnit_Framework_TestCase {

	public function testSum() {
		//
		// Integers
		//

		$values = array(1, 2, 3, 4, 4);

		$result = Statistics::sum($values);
		$expected = 14;

		$this->assertSame($expected, $result);

		//
		// Floats
		//

		$values = array(-1.0, 2.5, 3.25, 5.75);

		$result = Statistics::sum($values);
		$expected = 10.5;

		$this->assertSame($expected, $result);

		//
		// Mixed
		//

		$values = array(-2, 2.5, 3.25, 5.75, 0);

		$result = Statistics::sum($values);
		$expected = 9.5;

		$this->assertSame($expected, $result);
	}

	public function testMin() {
		//
		// Integers
		//

		$values = array(1, 2, 3, 4, 4);

		$result = Statistics::min($values);
		$expected = 1;

		$this->assertSame($expected, $result);

		//
		// Floats
		//

		$values = array(-1.0, 2.5, 3.25, 5.75);

		$result = Statistics::min($values);
		$expected = -1.0;

		$this->assertSame($expected, $result);
	}

	public function testMax() {
		//
		// Integers
		//

		$values = array(1, 2, 3, 4, 4);

		$result = Statistics::max($values);
		$expected = 4;

		$this->assertSame($expected, $result);

		//
		// Floats
		//

		$values = array(-1.0, 2.5, 3.25, 5.75);

		$result = Statistics::max($values);
		$expected = 5.75;

		$this->assertSame($expected, $result);
	}

	public function testMean() {
		//
		// Integers
		//

		$values = array(1, 2, 3, 4, 4);

		$result = Statistics::mean($values);
		$expected = 2.8;

		$this->assertSame($expected, $result);

		//
		// Floats
		//

		$values = array(-1.0, 2.5, 3.25, 5.75);

		$result = Statistics::mean($values);
		$expected = 2.625;

		$this->assertSame($expected, $result);

		//
		// Mixed
		//

		$values = array(-2, 2.5, 3.25, 5.75, 0);

		$result = Statistics::mean($values);
		$expected = 1.9;

		$this->assertSame($expected, $result);
	}

	public function testFrequency() {
		//
		// Integers
		//

		$values = array(1, 1, 2, 3, 3, 3, 3, 4);

		$result = Statistics::frequency($values);
		$expected = array(
			4 => 1,
			2 => 1,
			1 => 2,
			3 => 4,
		);

		$this->assertSame($expected, $result);

		//
		// Floats
		//

		$values = array(1, 3, 6, 6, 6, 6, 7.12, 7.12, 12, 12, 17);

		$result = Statistics::frequency($values);
		$expected = array(
			17 => 1,
			1 => 1,
			3 => 1,
			12 => 2,
			'7.12' => 2,
			6 => 4,
		);

		$this->assertSame($expected, $result);

		//
		// Strings
		//

		$values = array('red', 'blue', 'blue', 'red', 'green', 'red', 'red');

		$result = Statistics::frequency($values);
		$expected = array(
			'green' => 1,
			'blue' => 2,
			'red' => 4,
		);

		$this->assertSame($expected, $result);
	}

	public function testMode() {
		//
		// Integers
		//

		$values = array(3);

		$result = Statistics::mode($values);
		$expected = 3;

		$this->assertSame($expected, $result);

		$values = array(1, 1, 2, 3, 3, 3, 3, 4);

		$result = Statistics::mode($values);
		$expected = 3;

		$this->assertSame($expected, $result);

		$values = array(1, 3, 6, 6, 6, 6, 7, 7, 12, 12, 17);

		$result = Statistics::mode($values);
		$expected = 6;

		$this->assertSame($expected, $result);

		//
		// Strings
		//

		$values = array('red', 'blue', 'blue', 'red', 'green', 'red', 'red');

		$result = Statistics::mode($values);
		$expected = 'red';

		$this->assertSame($expected, $result);
	}

/**
 * @expectedException StatisticsError
 */
	public function testModeNotExactlyOne() {
		$values = array(1, 1, 2, 4, 4);

		$result = Statistics::mode($values);
	}

	public function testVariance() {
		//
		// Sample (default)
		//

		//
		// Integers
		//
		$values = array(2, 4, 4, 4, 5, 5, 7, 9);
		$sample = true;

		$result = Statistics::variance($values, $sample);
		$expected = 4.571429;

		$this->assertEquals($expected, $result, '', pow(10, -4));

		//
		// Floats
		//

		$values = array(0.0, 0.25, 0.25, 1.25, 1.5, 1.75, 2.75, 3.25);
		$sample = true;

		$result = Statistics::variance($values, $sample);
		$expected = 1.428571;

		$this->assertEquals($expected, $result, '', pow(10, -4));

		//
		// Population
		//

		//
		// Integers
		//
		$values = array(2, 4, 4, 4, 5, 5, 7, 9);
		$sample = false;

		$result = Statistics::variance($values, $sample);
		$expected = 4;

		$this->assertSame($expected, $result);

		//
		// Floats
		//

		$values = array(0.0, 0.25, 0.25, 1.25, 1.5, 1.75, 2.75, 3.25);
		$sample = false;

		$result = Statistics::variance($values, $sample);
		$expected = 1.25;

		$this->assertSame($expected, $result, '', pow(10, -4));
	}

	public function testStandardDeviation() {
		//
		// Sample (default)
		//

		//
		// Integers
		//
		$values = array(2, 4, 4, 4, 5, 5, 7, 9);
		$sample = true;

		$result = Statistics::standardDeviation($values, $sample);
		$expected = 2.13809;

		$this->assertEquals($expected, $result, '', pow(10, -4));

		//
		// Floats
		//

		$values = array(1.5, 2.5, 2.5, 2.75, 3.25, 4.75);
		$sample = true;

		$result = Statistics::standardDeviation($values, $sample);
		$expected = 1.081087;

		$this->assertEquals($expected, $result, '', pow(10, -4));

		//
		// Population
		//

		//
		// Integers
		//
		$values = array(2, 4, 4, 4, 5, 5, 7, 9);
		$sample = false;

		$result = Statistics::standardDeviation($values, $sample);
		$expected = 2.0;

		$this->assertSame($expected, $result);

		//
		// Floats
		//

		$values = array(1.5, 2.5, 2.5, 2.75, 3.25, 4.75);
		$sample = false;

		$result = Statistics::standardDeviation($values, $sample);
		$expected = 0.9868;

		$this->assertEquals($expected, $result, '', pow(10, -4));
	}

	public function testRange() {
		//
		// Integers (> 0)
		//
		$values = array(4, 6, 10, 15, 18);
		$result = Statistics::range($values);
		$expected = 14;

		$this->assertSame($expected, $result);

		//
		// Integers (< 0 and > 0)
		//

		$values = array(4, 6, 10, 15, 18, -18);
		$result = Statistics::range($values);
		$expected = 36;

		$this->assertSame($expected, $result);

		//
		// Floats
		//
		$values = array(11, 13, 4.3, 15.5, 14);
		$result = Statistics::range($values);
		$expected = 11.2;

		$this->assertSame($expected, $result);
	}

}
