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

	/**
	 * Test the method Text::is_email($string)
	 */
	public function testIs_email()
		{
		// test with a email
		$this->assertTrue($this->textClass->is_email("test@test.com"));

		// test without email
		$this->assertFalse($this->textClass->is_email("no email here"));

		// test with email in more text
		$this->assertFalse($this->textClass->is_email("this a email : test@test.com"));
		}

	/**
	 * Test the method Text::get_emails($string)
	 *
	 * @depends testIs_email
	 */
	public function testGet_emails()
		{
		// test find all emails
		$this->assertEquals(array("test@test.com", "nice@gmail.com"),
							$this->textClass->get_emails("Find test@test.com and nice@gmail.com"));

		// test with one email only
		$this->assertEquals(array("test@test.com"),
							$this->textClass->get_emails("test@test.com"));

		// test without email
		$this->assertFalse($this->textClass->get_emails("no email"));
		}

	/**
	 * Test the method Text::contains_email($string)
	 *
	 * @depends testGet_emails
	 */
	public function testContains_email()
		{
		// test with more emails
		$this->assertTrue($this->textClass->contains_email("Find test@test.com and nice@gmail.com"));

		// test with one email only
		$this->assertTrue($this->textClass->contains_email("test@test.com"));

		// test without email
		$this->assertFalse($this->textClass->contains_email("no email"));
		}
	}
