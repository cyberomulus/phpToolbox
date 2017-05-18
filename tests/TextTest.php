<?php
/*
 * This file is part of the phpToolBox package.
 *
 * (c) Brack Romain <http://www.cyberomulus.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cyberomulus\PhpToolbox\tests;

use Cyberomulus\PhpToolbox\Text;
use PHPUnit\Framework\TestCase;

/**
 * Test class for Cyberomulus\PhpToolbox\Text
 *
 * @package	Cyberomulus\PhpToolbox\tests
 * @author	Brack Romain <http://www.cyberomulus.me>
 */
class TextTest extends TestCase
	{
	/**
	 * @var	Text
	 */
	protected $textClass;

	/**
	 * Initialise the tested class
	 */
	protected function setUp()
		{
		$this->textClass = new Text();
		}

	/**
	 * Test the method Text::startWith($expected, $string)
	 */
	public function testStartWith()
		{
		// test with case sensitive
		$this->assertTrue($this->textClass->startWith("it's ok", "it's ok, nice!"));
		$this->assertFalse($this->textClass->startWith("It's ok", "it's ok, nice!"));

		// test without case sensitive
		$this->assertTrue($this->textClass->startWith("it's ok", "it's ok, nice!", false));
		$this->assertTrue($this->textClass->startWith("It's ok", "it's ok, nice!", false));
		}

	/**
	 * Test the method Text::endWith($expected, $string)
	 */
	public function testEndWith()
		{
		// test with case sensitive
		$this->assertTrue($this->textClass->endWith("nice!", "it's ok, nice!"));
		$this->assertFalse($this->textClass->endWith("Nice!", "it's ok, nice!"));

		// test without case sensitive
		$this->assertTrue($this->textClass->endWith("nice!", "it's ok, nice!", false));
		$this->assertTrue($this->textClass->endWith("Nice!", "it's ok, nice!", false));
		}
	}
