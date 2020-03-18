<?php
/*
 * This file is part of the phpToolBox package.
 *
 * (c) Brack Romain <cyberomulus.me@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cyberomulus\PhpToolbox\tests;

use Cyberomulus\PhpToolbox\Datetime;
use PHPUnit\Framework\TestCase;

class DatetimeTest extends TestCase
	{
	/**
	 * @var	\Cyberomulus\PhpToolbox\Datetime
	 */
	protected $datetimeClass;

	/**
	 * Initialize the tested class
	 */
	protected function setUp()
		{
		$this->datetimeClass = new Datetime();
		}

	/**
	 * Test the method Datetime::isTimezone($timezone)
	 */
	public function testIsTimezone()
		{
		// test OK
		$this->assertTrue($this->datetimeClass->isTimezone("Europe/Paris"));

		// test lowercase
		$this->assertFalse($this->datetimeClass->isTimezone("europe/paris"));

		// test no ok
		$this->assertFalse($this->datetimeClass->isTimezone("europe/test"));
		}
	}
